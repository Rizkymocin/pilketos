<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'public_id',
        'election_id',
        'president_name',
        'vide_president_name',
        'pair_number',
        'vision',
        'missions',
        'photo_file',
        'slogan'
    ];

    public function election(){
        return $this->belongsTo(Election::class);
    }

    public function vote(){
        return $this->hasMany(Vote::class);
    }
}
