<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class SchoolClass extends Model
{
    use HasUuids;
    protected $fillable = [
        'public_id',
        'department_id',
        'classname',
        'grade'
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

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function student(){
        return $this->hasMany(SchoolClass::class);
    }
}
