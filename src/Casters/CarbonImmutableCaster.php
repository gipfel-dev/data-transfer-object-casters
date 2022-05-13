<?php

namespace Gipfel\DataTransferObjectCasters\Casters;

use Carbon\CarbonImmutable;
use Spatie\DataTransferObject\Caster;

class CarbonImmutableCaster implements Caster
{
    public function __construct(
        protected string $types,
        protected ?string $timezone = null,
        protected ?string $format = null
    ) {}

    public function cast(mixed $value): CarbonImmutable
    {
        if ($this->format) {
            return CarbonImmutable::createFromFormat($this->format, $value, $this->timezone);
        }

        return CarbonImmutable::parse($value, $this->timezone);
    }
}
