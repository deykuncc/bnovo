<?php

namespace App\Services\Api\Guest;

use App\Exceptions\Api\Guest\InvalidPhoneNumberException;

trait GuestHelperTrait
{
    /**
     * @param array $data
     * @return int|null
     * @throws InvalidPhoneNumberException
     */
    public function getCountry(array $data): ?int
    {
        if (!empty($data['phone'])) {
            $phoneNumber = substr(ltrim($data['phone'], '+'), 0, 3);
            $country = $this->countryRepository->findByPhoneNumber($phoneNumber);
            if ($country === null)
                throw new InvalidPhoneNumberException();
        } else {
            $country = $this->countryRepository->findByCountry($data['country']);
        }
        return $country->id ?? null;
    }
}
