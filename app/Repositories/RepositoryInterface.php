<?php

namespace App\Repositories;
use Exception;
use Illuminate\Support\Collection;

interface RepositoryInterface
{

    public function create(array $data = []): object;

    public function update(int $id, array $attributes = []): ?object;

    /**
     * @throws Exception
     */
    public function delete(int $id = 0): int|bool;

    /**
     * @throws Exception
     */
    public function find(int $id, array $columns = ['*'], array $params = []): ?object;

    public function all(): Collection;
}
