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
        $distanceUnit = DistanceUnit::factory()->createOne();

        $this->assertModelExists($distanceUnit);
    }

    public function testDelete()
    {
        $distanceUnit = DistanceUnit::factory()->createOne();

        $distanceUnit->delete();

        $this->assertModelMissing($distanceUnit);
    }
}
