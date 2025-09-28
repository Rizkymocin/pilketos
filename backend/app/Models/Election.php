<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = [
        'public_id',
        'school_id',
        'election_year',
        'voting_day'
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }
}
