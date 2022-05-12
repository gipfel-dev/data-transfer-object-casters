<?php

namespace Gipfel\DataTransferObjectCasters\Casters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Caster;

class ModelCaster implements Caster
{
    public function __construct(
        protected string $type,
        protected string $model,
        protected string $column = 'id'
    ) {}

    public function cast(mixed $value): Collection|Model|null
    {
        if ($value instanceof $this->model) {
            return $value;
        }

        if (Arr::accessible($value)) {
            return $this->model::whereIn($this->column, $value)->get();
        }

        return $this->model::where($this->column, $value)->first();
    }
}
