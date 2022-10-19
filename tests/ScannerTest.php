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
        ->findByName(\Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers\UserController::class)->toHaveCount(1)
        ->and($result->all())
        ->toHaveCount(2)
        ->each(
            fn ($item) => $item
                ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Model\ClassInfo::class)
                ->getName()->toBeString()
                ->getAttributes()->toBeArray()
                ->getReflection()->toBeInstanceOf(ReflectionClass::class)
        )
        ->and($result->all()[0])
        ->getAttributes()->toHaveCount(2)
        ->and($result->all()[0])
        ->getConstructor()->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Model\MethodInfo::class)
        ->and($result->all()[0]->getConstructor())
        ->getParameters()->toHaveCount(1)
        ->and($result->all()[0]->getConstructor()->getParameters()[0])
        ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Model\ParameterInfo::class)
        ->getName()->toEqual('postService')
        ->getType()->toBeInstanceOf(ReflectionNamedType::class)
        ->getReflection()->toBeInstanceOf(ReflectionParameter::class)
        ->getAttributes()->toHaveCount(1)
        ->and($result->all()[0]->getProperties())
        ->toHaveCount(1)
        ->each(
            fn ($item) => $item
                ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Model\PropertyInfo::class)
                ->getName()->toEqual('postService')
                ->getAttributes()->toBeArray()
                ->getAttributes()->toHaveCount(1)
                ->getReflection()->toBeInstanceOf(ReflectionProperty::class)
        )
        ->and($result->all()[1])
        ->getAttributes()->toHaveCount(1)
        ->getName()->toEqual(\Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers\UserController::class)
        ->and($result->all()[0]->getMethods())
        ->toHaveCount(2)
        ->each(
            fn ($item) => $item
                ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\Model\MethodInfo::class)
                ->getName()->toBeString()
                ->getAttributes()->toBeArray()
                ->getReflection()->toBeInstanceOf(ReflectionMethod::class)
        );
});

it('init attribute', function () {
    $directory = __DIR__.'/TestClasses/Controllers';

    $namespace = 'Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers';

    $result = Scanner::in($directory, $namespace)->scan();

    expect($result->all()[1]->getAttributes()[0])->toBeInstanceOf(
        \Nddcoder\PhpAttributesScanner\Tests\TestAttributes\RequestMapping::class
    )
        ->and($result->all()[1]->getMethods()[0]->getAttributes()[0])->toBeInstanceOf(
            \Nddcoder\PhpAttributesScanner\Tests\TestAttributes\GetMapping::class
        )
        ->and($result->all()[0]->getProperties()[0]->getAttributes()[0])->toBeInstanceOf(
            \Nddcoder\PhpAttributesScanner\Tests\TestAttributes\Autowire::class
        );
});


it('can scan and return empty result when empty  directory', function () {
    $directory = '';
    $namespace = 'Nddcoder\PhpAttributesScanner\Tests\TestClasses\Controllers';

    expect(Scanner::in($directory, $namespace)->scan())
        ->toBeInstanceOf(\Nddcoder\PhpAttributesScanner\ScanResult::class)
        ->all()->toHaveCount(0);
});
