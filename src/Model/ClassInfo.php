<?php

namespace Nddcoder\PhpAttributesScanner\Model;

class ClassInfo
{
    public function __construct(
        protected string $name,
        protected array $attributes,
        protected ?MethodInfo $constructor,
        protected array $methods,
        protected array $properties,
        protected \ReflectionClass $reflection
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getConstructor(): ?MethodInfo
    {
        return $this->constructor;
    }

    /**
     * @return \Nddcoder\PhpAttributesScanner\Model\MethodInfo[]
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @return \Nddcoder\PhpAttributesScanner\Model\PropertyInfo[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @return \ReflectionClass
     */
    public function getReflection(): \ReflectionClass
    {
        return $this->reflection;
    }
}
