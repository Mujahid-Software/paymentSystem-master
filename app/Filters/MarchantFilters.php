<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class MarchantFilters extends QueryFilters
{
    protected array $allowedFilters = [
        'name',
        'identity_number',
        'phone',
        'address',
        'iban',
        'email',
        'commercial_registration_number',
        'tax_number',
    ];

    protected array $columnSearch = [
        'name',
        'identity_number',
        'phone',
        'address',
        'iban',
        'email',
        'commercial_registration_number',
        'tax_number',
    ];
}
