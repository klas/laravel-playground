<?php

namespace App\Repositories\Eloquent;

use App\Models\Activity;
use App\Repositories\ActivityRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityRepository.
 */
class ActivityRepository implements ActivityRepositoryInterface
{
    public function __construct(protected Activity $model)
    {
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /*
    * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
    */
    public function find(int $id, array $with = [], array $params = []): ?Model
    {
        return $this->model->with($with)->findOrFail($id);
    }

    public function delete(int $id)
    {
        return $this->model::query()->find($id)->delete();
    }

    /*
    * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
    */
    public function update(int $id, array $attributes): ?Model
    {
        $model = $this->find($id);
        $status = $model->update($attributes);

        return $status ? $model : null;
    }
}
