<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface DistanceCalculatorServiceInterface {
    public function sumPerUnit(
        Collection $summableItems,
        string $distanceProperty = 'distance',
        string $distanceUnitProperty = 'distance_unit'): ?Collection;
}
