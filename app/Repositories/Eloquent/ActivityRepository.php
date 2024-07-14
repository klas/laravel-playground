<?php

namespace App\Repositories\Eloquent;

use App\Models\Activity;
use App\Repositories\ActivityRepositoryInterface;

class ActivityRepository  extends AbstractRepository implements ActivityRepositoryInterface
{
    public function getModelClass(): string
    {
        return Activity::class;
    }
}
