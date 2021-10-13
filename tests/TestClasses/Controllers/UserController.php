<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers;

use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\CrossOrigin;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\GetMapping;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\PostMapping;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\Qualified;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\RequestMapping;
use Nddcoder\PhpAttributesScanner\Tests\TestClasses\Services\PostService;

#[RequestMapping('/users')]
class UserController
{
    #[GetMapping]
    #[CrossOrigin]
    public function index()
    {
    }

    #[PostMapping]
    public function store()
    {
    }
}
