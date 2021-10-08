<?php

use Nddcoder\PhpAttributesScanner\Support\Str;

it('can replace first correctly', function () {
    expect(Str::replaceFirst('abc', 'ABC', 'abcabcdef'))
        ->toEqual('ABCabcdef');

    expect(Str::replaceFirst('', 'ABC', 'abcabcdef'))
        ->toEqual('abcabcdef');

    expect(Str::replaceFirst('ABC', 'ddd', 'abcabcdef'))
        ->toEqual('abcabcdef');
});

it('can replace last correctly', function () {
    expect(Str::replaceLast('def', 'DEF', 'abcdefdef'))
        ->toEqual('abcdefDEF');

    expect(Str::replaceLast('', 'DEF', 'abcdefdef'))
        ->toEqual('abcdefdef');

    expect(Str::replaceLast('DEF', 'aaa', 'abcdefdef'))
        ->toEqual('abcdefdef');
});
