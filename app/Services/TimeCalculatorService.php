<?php

namespace App\Services;

use Carbon\CarbonInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TimeCalculatorService implements TimeCalculatorServiceInterface
{

    public function sumTimes(
        Collection $summableItems,
        string $startProperty = 'start',
        string $endProperty = 'finish'
    ): ?string {
        $sum = 0;

        $summableItems->each(function ($item, $key) use ($startProperty, $endProperty, &$sum) {
            $sum += Carbon::parse($item[$endProperty])->diffInSeconds(Carbon::parse($item[$startProperty]));
        });

        $options = [
            'join' => ', ',
            'parts' => 3,
            'syntax' => CarbonInterface::DIFF_ABSOLUTE,
        ];

        return Carbon::now()->addSeconds($sum)->diffForHumans(Carbon::now(), $options);
    }
}
