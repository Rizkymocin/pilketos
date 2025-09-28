<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'public_id',
        'school_name',
        'address',
        'principal_name',
    ];
}
