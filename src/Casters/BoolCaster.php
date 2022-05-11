<?php

namespace Gipfel\DataTransferObjectCasters\Casters;

use Spatie\DataTransferObject\Caster;

class BoolCaster implements Caster
{

    public function cast(mixed $value): bool
    {
        $allowedValues = [true, 'true', 1, '1', 'on'];

        return in_array($value, $allowedValues, true);
    }

}
