<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use HasFactory, SoftDeletes;
    public function course()
    {
        return $this->hasMany(Course::class,'id','course_id');
    }
    public function t_course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->select('id','name','last_name','phone','email');
    }
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
