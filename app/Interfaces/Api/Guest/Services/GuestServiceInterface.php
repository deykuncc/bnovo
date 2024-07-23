<?php

namespace App\Interfaces\Api\Guest\Services;

use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuestServiceInterface
{
    public function list(int $limit): LengthAwarePaginator;

    public function show(int $id): Guest;

    public function store(array $data): Guest;

    public function update(int $id, array $data): bool;

    public function destroy(int $id): bool;
}
