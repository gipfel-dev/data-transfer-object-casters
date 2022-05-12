<?php

namespace Gipfel\DataTransferObjectCasters\Tests;

use Carbon\Carbon;
use Gipfel\DataTransferObjectCasters\Casters\CarbonCaster;

test('carbon caster', function () {
    $now = Carbon::now('UTC');

    $caster = new CarbonCaster(CarbonCaster::class);

    $casted = $caster->cast($now->toIso8601String());

    expect($casted)
        ->toBeInstanceOf(Carbon::class);

    expect($casted->format('Y-m-d H:i:s'))
        ->toBe($now->format('Y-m-d H:i:s'));

    expect($casted->timezone->toOffsetName())
        ->toBe($now->timezone->toOffsetName());
});

test('carbon caster with timezone', function () {
    $now = Carbon::now('Europe/Berlin');

    $caster = new CarbonCaster(CarbonCaster::class, 'Europe/Berlin');

    $casted = $caster->cast($now->toIso8601String());

    expect($casted)
        ->toBeInstanceOf(Carbon::class);

    expect($casted->format('Y-m-d H:i:s'))
        ->toBe($now->format('Y-m-d H:i:s'));

    expect($casted->timezone->toOffsetName())
        ->toBe($now->timezone->toOffsetName());
});

test('carbon caster with timezone & format', function () {
    $now = Carbon::now('Europe/Berlin');

    $caster = new CarbonCaster(CarbonCaster::class, 'Europe/Berlin', 'Ymd H:i');

    $casted = $caster->cast($now->format('Ymd H:i'));

    expect($casted)
        ->toBeInstanceOf(Carbon::class);

    expect($casted->format('Y-m-d H:i:s'))
        ->toBe($now->format('Y-m-d H:i:00'));

    expect($casted->timezone->toOffsetName())
        ->toBe($now->timezone->toOffsetName());
});
