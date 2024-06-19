<?php

namespace Tests\Unit;

use App\Models\ActivityType;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ActivityTypeModelTest extends TestCase
{
    public function testExpectedColumns()
    {
        $this->assertTrue(
            Schema::hasColumns('activity_types', [
                'id', 'name',
            ])
        );
    }

    public function testInsert()
    {
        $activityType = ActivityType::create([
            'name' => 'testActivityType'
        ]);

        $this->assertModelExists($activityType);
    }

    public function testDelete()
    {
        $activityType = ActivityType::create([
            'name' => 'testActivityType2'
        ]);

        $activityType->delete();

        $this->assertModelMissing($activityType);
    }
}
