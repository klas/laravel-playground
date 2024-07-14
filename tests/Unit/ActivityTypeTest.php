<?php

namespace Tests\Unit;

use App\Models\ActivityType;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/*
 * @doesNotPerformAssertions
 */
class ActivityTypeTest extends TestCase
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
        //$activityType = ActivityType::factory()->createOne();
        $activityType = ActivityType::create(['name' => 'abc123']);

        $this->assertModelExists($activityType);
        $this->assertEquals('abc123', $activityType->name);
    }

    public function testDelete()
    {
        $activityType = ActivityType::factory()->createOne();
        $activityType->delete();

        $this->assertModelMissing($activityType);
    }
}
