<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestAttributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
class Qualified
{
    public function __construct(public string $name)
    {
    }
}
