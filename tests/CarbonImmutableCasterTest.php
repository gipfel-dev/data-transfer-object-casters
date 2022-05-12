<?php

namespace Gipfel\DataTransferObjectCasters\Tests;

use Carbon\CarbonImmutable;
use Gipfel\DataTransferObjectCasters\Casters\CarbonImmutableCaster;

test('carbon immutable caster', function () {
    $now = CarbonImmutable::now('UTC');

    $caster = new CarbonImmutableCaster(CarbonImmutableCaster::class);

    $casted = $caster->cast($now->toIso8601String());

    expect($casted)
        ->toBeInstanceOf(CarbonImmutable::class);

    expect($casted->format('Y-m-d H:i:s'))
        ->toBe($now->format('Y-m-d H:i:s'));

    expect($casted->timezone->toOffsetName())
        ->toBe($now->timezone->toOffsetName());
});

test('carbon immutable caster with timezone', function () {
    $now = CarbonImmutable::now('Europe/Berlin');

    $caster = new CarbonImmutableCaster(CarbonImmutableCaster::class, 'Europe/Berlin');

    $casted = $caster->cast($now->toIso8601String());

    expect($casted)
        ->toBeInstanceOf(CarbonImmutable::class);

    expect($casted->format('Y-m-d H:i:s'))
        ->toBe($now->format('Y-m-d H:i:s'));

    expect($casted->timezone->toOffsetName())
        ->toBe($now->timezone->toOffsetName());
});

test('carbon caster with timezone & format', function () {
    $now = CarbonImmutable::now('Europe/Berlin');

    $caster = new CarbonImmutableCaster(CarbonImmutableCaster::class, 'Europe/Berlin', 'Ymd H:i');

    $casted = $caster->cast($now->format('Ymd H:i'));

    expect($casted)
        ->toBeInstanceOf(CarbonImmutable::class);

    expect($casted->format('Y-m-d H:i:s'))
        ->toBe($now->format('Y-m-d H:i:00'));

    expect($casted->timezone->toOffsetName())
        ->toBe($now->timezone->toOffsetName());
});
