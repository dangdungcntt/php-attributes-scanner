<?php

namespace Nddcoder\PhpAttributesScanner\Model;

class PropertyInfo
{
    public function __construct(
        protected string $name,
        protected array $attributes,
        protected \ReflectionProperty $reflection,
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
     * @return \ReflectionProperty
     */
    public function getReflection(): \ReflectionProperty
    {
        return $this->reflection;
    }
}
