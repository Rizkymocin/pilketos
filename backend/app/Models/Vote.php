<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'public_id',
        'candidate_id',
        'student_id',
        'voted_at',
        'signature'
    ];

    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
