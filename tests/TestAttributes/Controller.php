<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestAttributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Controller
{
    public function __construct()
    {
    }
}
