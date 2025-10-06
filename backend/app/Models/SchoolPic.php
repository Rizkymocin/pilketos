<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class SchoolPic extends Model
{
    use HasUuids;

    protected $fillable = [
        'public_id',
        'user_id',
        'school_id',
        'name',
        'occupation'
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function($model) {
            if(empty($model->public_id)){
                $model->public_id = Str::uuid()->toString();
            }
        });
    }

    // Route model binding by UUID
    public function getRouteKeyName()
    {
        return 'public_id';
    }

    public function  uniqueIds()
    {
        return ['public_id'];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }
}
