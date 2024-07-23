<?php

namespace App\Interfaces\Api\Guest\Repositories;

use App\Models\Country;

interface CountryRepositoryInterface
{
    public function findByPhoneNumber(int $phoneNumber): ?Country;
}
