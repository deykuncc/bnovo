<?php

namespace App\Interfaces\Api\Guest\Repositories;

use App\Models\Guest;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuestRepositoryInterface
{
    public function getById(int $id): ?Guest;

    public function destroy(Guest $guest): bool;

    public function update(Guest $guest, array $data): bool;

    public function store(array $data): Guest;

    public function list(int $limit): LengthAwarePaginator;
}
