<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestAttributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class CrossOrigin
{
    public function __construct(
        public array $origins = ['*']
    ) {
    }
}
