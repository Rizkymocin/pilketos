<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolPic extends Model
{
    protected $fillable = [
        'public_id',
        'user_id',
        'name',
        'occupation'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
