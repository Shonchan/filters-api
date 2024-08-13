<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    protected Builder $builder;
    protected string $delimeter = ',';

    public function __construct(public Request $request)
    {
    }

    public function filters(): array|string|null
    {
        return $this->request->query();
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
//                dd($value);
                call_user_func([$this, $name],  array_filter($value));
            }
        }

        return $this->builder;
    }

    protected function paramToArray($param): array
    {
        return explode($this->delimeter, $param);
    }

}
