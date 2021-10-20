<?php

namespace Nddcoder\PhpAttributesScanner;

use Nddcoder\PhpAttributesScanner\Model\ClassInfo;
use Nddcoder\PhpAttributesScanner\Model\MethodInfo;
use Nddcoder\PhpAttributesScanner\Model\ParameterInfo;
use Nddcoder\PhpAttributesScanner\Model\PropertyInfo;
use Nddcoder\PhpAttributesScanner\Support\Str;
use ReflectionClass;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class Scanner
{
    public function __construct(
        protected string $directory,
        protected string $namespace,
    ) {
    }

    public static function in(string $directory, string $namespace): static
    {
        return new static($directory, $namespace);
    }

    public function scan(): ScanResult
    {
        if (empty($this->directory)) {
            return new ScanResult([]);
        }

        $files = (new Finder())
            ->files()
            ->name('*.php')
            ->in($this->directory);

        $results = [];

        foreach ($files as $file) {
            $classInfo = $this->scanFile($file);
            if (is_null($classInfo)) {
                continue;
            }
            $results[] = $classInfo;
        }

        return new ScanResult($results);
    }

    protected function scanFile(SplFileInfo $file): ?ClassInfo
    {
        $class     = $this->namespace.'\\'.trim(
                Str::replaceFirst($this->directory, '', $file->getRealPath()),
                DIRECTORY_SEPARATOR
            );
        $className = str_replace(
            DIRECTORY_SEPARATOR,
            '\\',
            ucfirst(Str::replaceLast('.php', '', $class))
        );

        if (!class_exists($className)) {
            return null;
        }

        $reflectionClass = new ReflectionClass($className);

        $reflectionConstructor = $reflectionClass->getConstructor();

        return new ClassInfo(
            name: $reflectionClass->getName(),
            attributes: $this->initAttributes($reflectionClass->getAttributes()),
            constructor: $reflectionConstructor ? new MethodInfo(
                name: $reflectionConstructor->getName(),
                attributes: $this->initAttributes($reflectionConstructor->getAttributes()),
                parameters: array_map(fn(
                    \ReflectionParameter $reflectionParameter
                ) => new ParameterInfo(
                    name: $reflectionParameter->getName(),
                    attributes: $this->initAttributes($reflectionParameter->getAttributes()),
                    type: $reflectionParameter->getType(),
                    reflection: $reflectionParameter,
                ), $reflectionConstructor->getParameters()),
                reflection: $reflectionConstructor
            ) : null,
            methods: array_values(
                array_filter(
                    array_map(
                        fn(\ReflectionMethod $reflectionMethod) => new MethodInfo(
                            name: $reflectionMethod->getName(),
                            attributes: $this->initAttributes($reflectionMethod->getAttributes()),
                            parameters: array_map(fn(
                                \ReflectionParameter $reflectionParameter
                            ) => new ParameterInfo(
                                name: $reflectionParameter->getName(),
                                attributes: $this->initAttributes($reflectionParameter->getAttributes()),
                                type: $reflectionParameter->getType(),
                                reflection: $reflectionParameter,
                            ), $reflectionMethod->getParameters()),
                            reflection: $reflectionMethod
                        ),
                        $reflectionClass->getMethods()
                    )
                    , fn(MethodInfo $m) => $m->getName() != '__construct')
            ),
            properties: array_map(
                fn(\ReflectionProperty $reflectionProperty) => new PropertyInfo(
                    name: $reflectionProperty->getName(),
                    attributes: $this->initAttributes($reflectionProperty->getAttributes()),
                    reflection: $reflectionProperty,
                ),
                $reflectionClass->getProperties()
            ),
            reflection: $reflectionClass
        );
    }

    protected function initAttributes(array $reflectionAttributes): array
    {
        return array_map(
            fn(\ReflectionAttribute $reflectionAttribute) => $reflectionAttribute->newInstance(),
            $reflectionAttributes
        );
    }
}
