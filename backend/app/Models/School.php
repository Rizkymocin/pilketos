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
        'level'
    ];

    public function pic(){
        return $this->hasMany(SchoolPic::class);
    }

    public function departments(){
        return $this->hasMany(Department::class);
    }
}
