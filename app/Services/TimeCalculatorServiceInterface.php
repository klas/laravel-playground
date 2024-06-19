<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

interface TimeCalculatorServiceInterface {
    public function sumTimes(
        Collection $summableItems,
        string $startProperty = 'start',
        string $endProperty = 'end'): ?string;
}
