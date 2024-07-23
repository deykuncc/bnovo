<?php

namespace App\Services\Api\Guest;

use App\Exceptions\Api\Guest\InvalidGuestId;
use App\Exceptions\Api\Guest\InvalidPhoneNumberException;
use App\Interfaces\Api\Guest\Repositories\CountryRepositoryInterface;
use App\Interfaces\Api\Guest\Repositories\GuestRepositoryInterface;
use App\Interfaces\Api\Guest\Services\GuestServiceInterface;
use App\Models\Guest;
use App\Repositories\Api\Country\CountryRepository;
use App\Repositories\Api\Guest\GuestRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class GuestService implements GuestServiceInterface
{
    use GuestHelperTrait;

    private GuestRepository $guestRepository;
    private CountryRepository $countryRepository;

    /**
     * @param GuestRepositoryInterface $guestRepository
     * @param CountryRepositoryInterface $countryRepository
     */
    public function __construct(GuestRepositoryInterface $guestRepository, CountryRepositoryInterface $countryRepository)
    {
        $this->guestRepository = $guestRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * @param int $limit
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function list(int $limit): LengthAwarePaginator
    {
        return $this->guestRepository->list($limit);
    }

    /**
     * @param int $id
     * @return Guest
     * @throws \Exception
     */
    public function show(int $id): Guest
    {
        return $this->guestRepository->getById($id);
    }

    /**
     * @param array $data
     * @throws InvalidPhoneNumberException
     */
    public function store(array $data): Guest
    {
        $data['country_id'] = $this->getCountry($data);
        return $this->guestRepository->store($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws InvalidGuestId
     */
    public function update(int $id, array $data): bool
    {
        $guest = $this->guestRepository->getById($id);

        if ($guest === null)
            throw new InvalidGuestId();

        if ((isset($data['phone']) && !empty($data['phone'])) || (isset($data['country']) && !empty($data['country'])))
            $data['country_id'] = $this->getCountry($data);

        return $this->guestRepository->update($guest, $data);
    }

    /**
     * @param int $id
     * @return bool
     * @throws InvalidGuestId
     */
    public function destroy(int $id): bool
    {
        $guest = $this->guestRepository->getById($id);

        if ($guest === null)
            throw new InvalidGuestId();

        return $this->guestRepository->destroy($guest);
    }
}
