<?php

namespace Gipfel\DataTransferObjectCasters\Tests;

use Gipfel\DataTransferObjectCasters\Casters\BoolCaster;

test('bool caster casts true (strict)', function () {
    $value = true;

    $caster = new BoolCaster();

    expect($caster->cast($value))->toBeTrue();
});

test('bool caster casts true', function () {
    $value = 'true';

    $caster = new BoolCaster();

    expect($caster->cast($value))->toBeTrue();
});

test('bool caster casts 1 (strict)', function () {
    $value = 1;

    $caster = new BoolCaster();

    expect($caster->cast($value))->toBeTrue();
});

test('bool caster casts 1', function () {
    $value = '1';

    $caster = new BoolCaster();

    expect($caster->cast($value))->toBeTrue();
});

test('bool caster casts on', function () {
    $value = 'on';

    $caster = new BoolCaster();

    expect($caster->cast($value))->toBeTrue();
});

test('bool caster casts null false', function () {
    $value = null;

    $caster = new BoolCaster();

    expect($caster->cast($value))->toBeFalse();
});

test('bool caster casts false false', function () {
    $value = false;

    $caster = new BoolCaster();

    expect($caster->cast($value))->toBeFalse();
});
