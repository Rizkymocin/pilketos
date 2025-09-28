<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'public_id',
        'class_id',
        'name',
        'nisn'
    ];

    public function school_class(){
        return $this->belongsTo(SchoolClass::class);
    }

    public function vote() {
        return $this->hasOne(Vote::class);
    }
}
