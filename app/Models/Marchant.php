<?php

namespace App\Models;

use App\Filters\MarchantFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marchant extends Model
{
    use HasFactory,Filterable;

    protected $default_filters = MarchantFilters::class;

    protected $fillable = [
        'name', 
        'identity_number', 
        'phone', 
        'address', 
        'iban', 
        'email', 
        'commercial_registration_number', 
        'commercial_registration_file', 
        'tax_number', 
    ];

}
