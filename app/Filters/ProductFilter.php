<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    public function features(array $features): Builder
    {
        foreach ($features as $feature_id => $values) {
            $this->builder->whereHas('featureOptions', function ($query) use ($feature_id, $values) {
                $query->where(function ($query) use ($feature_id, $values) {
                    $query->where('feature_id', $feature_id)
                        ->whereIn('value', $values);
                });
            });
        }

        return $this->builder;
    }
}
