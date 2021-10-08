<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestAttributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Autowire
{
    public function __construct()
    {
    }
}
