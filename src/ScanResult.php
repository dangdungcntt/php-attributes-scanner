<?php

namespace Nddcoder\PhpAttributesScanner;

use Nddcoder\PhpAttributesScanner\Model\ClassInfo;

class ScanResult
{
    public function __construct(
        protected array $data
    ) {
    }

    /**
     * @param  string  $attributeClass
     * @return \Nddcoder\PhpAttributesScanner\Model\ClassInfo[]
     */
    public function findByAttribute(string $attributeClass): array
    {
        return array_filter($this->data, function (ClassInfo $classInfo) use ($attributeClass) {
            foreach ($classInfo->getAttributes() as $attribute) {
                if ($attribute instanceof $attributeClass) {
                    return true;
                }
            }

            return false;
        });
    }

    /**
     * @param  string  $className
     * @return \Nddcoder\PhpAttributesScanner\Model\ClassInfo[]
     */
    public function findByName(string $className): array
    {
        return array_filter($this->data, fn (ClassInfo $classInfo) => $classInfo->getName() == $className);
    }

    /**
     * @return \Nddcoder\PhpAttributesScanner\Model\ClassInfo[]
     */
    public function all(): array
    {
        return $this->data;
    }
}
