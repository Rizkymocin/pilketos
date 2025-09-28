<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'public_id',
        'department_id',
        'classname',
        'grade'
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function student(){
        return $this->hasMany(SchoolClass::class);
    }
}
