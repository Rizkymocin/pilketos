<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'public_id',
        'school_id',
        'department',
        'shortname'
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function school_class(){
        return $this->hasMany(SchoolClass::class);
    }
}
