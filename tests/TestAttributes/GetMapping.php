<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestAttributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class GetMapping extends RequestMapping
{
    public function __construct(
        string $path = '/',
    ) {
        parent::__construct(
            path: $path
        );
    }
}
