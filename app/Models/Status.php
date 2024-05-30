<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name'];

    const ADMIN = 1;
    const ACTIVE = 2;
    const NOT_ACTIVE = 3;
    const BLOCKED = 4;
    const SUCCESSFULL = 5;
    const FAILED = 6;
}
