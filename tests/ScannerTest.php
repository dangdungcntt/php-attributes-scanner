<?php

use Nddcoder\PhpAttributesScanner\Scanner;

it('can scan and return result', function () {
    $directory = __DIR__.'/TestClasses/Controllers';
    $namespace = 'Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers';

    $result = Scanner::in($directory, $namespace)->scan();

    expect($result)
        ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\ScanResult::class)
        ->findByAttribute(\Nddcoder\PhpAttributesScanner\Tests\TestAttributes\Controller::class)->toHaveCount(1)
        ->findByAttribute(\Nddcoder\PhpAttributesScanner\Tests\TestAttributes\RequestMapping::class)->toHaveCount(2)
        ->findByName(\Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers\UserController::class)->toHaveCount(1);

    expect($result->all())
        ->toHaveCount(2)

        ->each(fn($item) => $item
            ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Model\ClassInfo::class)
            ->getName()->toBeString()
            ->getAttributes()->toBeArray()
            ->getReflection()->toBeInstanceOf(ReflectionClass::class)
        );

    expect($result->all()[0])
        ->getAttributes()->toHaveCount(1)
        ->getName()->toEqual(\Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers\UserController::class);

    expect($result->all()[0]->getMethods())
        ->toHaveCount(2)
        ->each(fn($item) => $item
            ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Model\MethodInfo::class)
            ->getName()->toBeString()
            ->getAttributes()->toBeArray()
            ->getReflection()->toBeInstanceOf(ReflectionMethod::class)
        );

    expect($result->all()[1])
        ->getAttributes()->toHaveCount(2);

    expect($result->all()[1]->getProperties())
        ->toHaveCount(1)
        ->each(fn($item) => $item
            ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Model\PropertyInfo::class)
            ->getName()->toEqual('postService')
            ->getAttributes()->toBeArray()
            ->getAttributes()->toHaveCount(1)
            ->getReflection()->toBeInstanceOf(ReflectionProperty::class)
        );
});

it('init attribute', function () {
    $directory = __DIR__.'/TestClasses/Controllers';;
    $namespace = 'Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers';

    $result = Scanner::in($directory, $namespace)->scan();
    expect($result->all()[0]->getAttributes()[0])->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Tests\TestAttributes\RequestMapping::class);
    expect($result->all()[0]->getMethods()[0]->getAttributes()[0])->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Tests\TestAttributes\GetMapping::class);
    expect($result->all()[1]->getProperties()[0]->getAttributes()[0])->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Tests\TestAttributes\Autowire::class);
});


it('can scan and return empty result when empty  directory', function () {
    $directory = '';
    $namespace = 'Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers';

    expect(Scanner::in($directory, $namespace)->scan())
        ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\ScanResult::class)
        ->all()->toHaveCount(0);
});
