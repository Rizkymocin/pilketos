<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Department extends Model
{
    use HasUuids;

    protected $fillable = [
        'public_id',
        'school_id',
        'department',
        'shortname'
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

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function school_class(){
        return $this->hasMany(SchoolClass::class);
    }
}
