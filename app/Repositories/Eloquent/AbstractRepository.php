<?php

namespace App\Repositories\Eloquent;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

abstract class AbstractRepository implements RepositoryInterface {

    public Model $model;

    public function __construct()
    {
        $this->model = App::make($this->getModelClass());
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    /*
    * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
    */
    public function find(int|string $id, array $columns = [], array $params = []): ?object
    {
        return $this->model->with($columns)->findOrFail($id);
    }

    public function delete(int $id = 0): int|bool
    {
        return $this->model->find($id)->delete();
    }

    /*
    * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
    */
    public function update(int $id, array $attributes = []): ?object
    {
        $model = $this->find($id);
        $status = $model->update($attributes);

        return $status ? $model : null;
    }

    public function create(array $data = []): object
    {
        return $this->model->create($data);
    }
}
