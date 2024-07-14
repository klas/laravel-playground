<?php

namespace Tests\Unit;

use App\Models\Activity;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Activity::class)]
class ActivityModelTest extends TestCase
{
    public function testExpectedColumns()
    {
        $this->assertTrue(
            Schema::hasColumns('activities', [
                'id',
                'name',
                'description',
                'activity_type_id',
                'distance',
                'distance_unit_id',
                'start',
                'finish',
                'status',
                'user_id'
            ])
        );
    }

    public function testInsert()
    {
        $activity = Activity::factory()->createOne();

        $this->assertModelExists($activity);
    }

    public function testDelete()
    {
        $activity = Activity::factory()->createOne();
        $activity->delete();

        $this->assertModelMissing($activity);
    }
}
