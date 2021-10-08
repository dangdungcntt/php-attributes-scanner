<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestAttributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class RequestMapping
{
    public function __construct(
        public string $path = '/',
        public string $method = 'GET'
    ) {
    }
}
