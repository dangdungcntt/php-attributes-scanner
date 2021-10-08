<?php

namespace Nddcoder\PhpAttributesScanner\Model;

class MethodInfo
{
    public function __construct(
        protected string $name,
        protected array $attributes,
        protected \ReflectionMethod $reflection
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

    /**
     * @return \ReflectionMethod
     */
    public function getReflection(): \ReflectionMethod
    {
        return $this->reflection;
    }
}
