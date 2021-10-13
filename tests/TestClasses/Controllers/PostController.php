<?php

namespace Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers;

use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\Autowire;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\Controller;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\GetMapping;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\PostMapping;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\Qualified;
use Nddcoder\PhpAttributesScanner\Tests\TestAttributes\RequestMapping;
use Nddcoder\PhpAttributesScanner\Tests\TestClasses\Services\PostService;

#[Controller]
#[RequestMapping('/posts')]
class PostController
{
    #[Autowire]
    protected PostService $postService;

    public function __construct(
        #[Qualified('beanName')] PostService $postService
    ) {
    }


    #[GetMapping]
    public function index()
    {
    }

    #[PostMapping]
    public function store()
    {
    }
}
