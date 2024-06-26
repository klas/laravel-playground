<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\Paginator;

interface ActivityRepositoryInterface
{

    public function create(array $attributes): Model;

    public function find(int $id, array $with = [], array $params = []): ?Model;

    public function delete(int $id);

    public function update(int $id, array $attributes): ?Model;

    public function all(): Collection;
}
