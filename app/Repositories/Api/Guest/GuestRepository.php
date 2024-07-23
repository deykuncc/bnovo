<?php

namespace App\Repositories\Api\Guest;

use App\Interfaces\Api\Guest\Repositories\GuestRepositoryInterface;
use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GuestRepository implements GuestRepositoryInterface
{
    /**
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public function list(int $limit): LengthAwarePaginator
    {
        return Guest::query()->paginate($limit);
    }

    /**
     * @param int $id
     * @return Guest|null
     */
    public function getById(int $id): ?Guest
    {
        return Guest::query()->lockForUpdate()->find($id);
    }

    public function store(array $data): Guest
    {
        return Guest::query()->create($data);
    }

    /**
     * @param Guest $guest
     * @param array $data
     * @return bool
     */
    public function update(Guest $guest, array $data): bool
    {
        return $guest->update(array_filter($data, function ($value) {
            return $value !== null;
        }));
    }

    /**
     * @param Guest $guest
     * @return bool
     */
    public function destroy(Guest $guest): bool
    {
        return $guest->delete();
    }
}
