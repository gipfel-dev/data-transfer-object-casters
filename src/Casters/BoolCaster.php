<?php

namespace Gipfel\DataTransferObjectCasters\Casters;

use Spatie\DataTransferObject\Caster;

class BoolCaster implements Caster
{

    public function cast(mixed $value): bool
    {
        return (bool) $value;
    }

}
