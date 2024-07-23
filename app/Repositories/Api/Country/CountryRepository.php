<?php

namespace App\Repositories\Api\Country;

use App\Interfaces\Api\Guest\Repositories\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{
    /**
     * @param int $phoneNumber
     * @return Country|null
     */
    public function findByPhoneNumber(int $phoneNumber): ?Country
    {
        return Country::query()
            ->select('id')
            ->whereRaw('? REGEXP CONCAT("^", code_phone)', [$phoneNumber])
            ->orderByRaw('LENGTH(code_phone) DESC')
            ->first();
    }

    /**
     * @param int $countryName
     * @return Country|null
     */
    public function findByCountry(string $countryName): ?Country
    {
        return Country::query()
            ->select('id', 'name', 'name_ru')
            ->where('name', ucfirst($countryName))
            ->orWhere('name_ru', ucfirst($countryName))
            ->first();
    }
}
