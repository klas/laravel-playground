<?php

namespace Tests\Unit;

use App\Services\DistanceCalculatorService;
use App\Services\DistanceCalculatorServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\TestCase;

class DistanceCalculatorServiceTest extends TestCase
{
    public function testSum()
    {
        $distanceCalculator = new DistanceCalculatorService();

        $items = [
            ['distance_unit' => 'km', 'distance' => 10],
            ['distance_unit' => 'km', 'distance' => 20],
            ['distance_unit' => 'km', 'distance' => 30],
            ['distance_unit' => 'm', 'distance' => 1000],
            ['distance_unit' => 'm', 'distance' => 1500],
        ];

        $this->assertEquals(['km' => 60, 'm' => 2500], $distanceCalculator->sumPerUnit(collect($items),
            'distance', 'distance_unit')->toArray());
    }
}
