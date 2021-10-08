<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers;

use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\CrossOrigin;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\GetMapping;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\PostMapping;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\RequestMapping;

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
