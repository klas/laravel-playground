<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class DistanceCalculatorService implements DistanceCalculatorServiceInterface
{
    public function sumPerUnit(
        Collection $summableItems,
        string $distanceProperty = 'distance',
        string $distanceUnitProperty = 'distance_unit'): ?Collection
    {
        $sums = [];

        $summableItems->groupBy($distanceUnitProperty)->each(function (Collection $items, $key) use ($distanceProperty, &$sums) {
            $sums[$key] = $items->sum($distanceProperty);
        });

        return collect($sums);
    }
}
