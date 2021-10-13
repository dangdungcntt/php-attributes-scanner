<?php

namespace Nddcoder\PhpAttributesScanner\Model;

class ParameterInfo
{
    public function __construct(
        protected string $name,
        protected array $attributes,
        protected ?\ReflectionType $type,
        protected \ReflectionParameter $reflection,
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

    public function getType(): ?\ReflectionType
    {
        return $this->type;
    }

    /**
     * @return \ReflectionParameter
     */
    public function getReflection(): \ReflectionParameter
    {
        return $this->reflection;
    }
}
