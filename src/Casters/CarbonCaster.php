<?php

namespace Gipfel\DataTransferObjectCasters\Casters;

use Carbon\Carbon;
use Spatie\DataTransferObject\Caster;

class CarbonCaster implements Caster
{
    public function __construct(
        protected string $type,
        protected ?string $timezone = 'UTC',
        protected ?string $format = null
    ) {}

    public function cast(mixed $value): Carbon
    {
        if ($this->format) {
            return Carbon::createFromFormat($this->format, $value, $this->timezone);
        }

        return Carbon::parse($value, $this->timezone);
    }
}
