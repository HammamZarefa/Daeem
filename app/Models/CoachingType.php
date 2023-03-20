<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CoachingType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function instructors()
    {
        return $this->belongsToMany(Instructor::class,'instructor_coaching_type');
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
