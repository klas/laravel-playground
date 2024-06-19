<?php

namespace Tests\Unit;

use App\Models\DistanceUnit;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DistanceUnitModelTest extends TestCase
{
    public function testExpectedColumns()
    {
        $this->assertTrue(
            Schema::hasColumns('distance_units', [
                'id', 'name',
            ])
        );
    }

    public function testInsert()
    {
        $distanceUnit = DistanceUnit::create([
            'name' => 'testDistanceUnit'
        ]);

        $this->assertModelExists($distanceUnit);
    }

    public function testDelete()
    {
        $distanceUnit = DistanceUnit::create([
            'name' => 'testDistanceUnit'
        ]);

        $distanceUnit->delete();

        $this->assertModelMissing($distanceUnit);
    }
}
