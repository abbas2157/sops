<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class ModuleStep extends Model
{
    use HasFactory, SoftDeletes;
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id')->with('trainer');
    }
    public function trainee_assignment()
    {
        return $this->belongsTo(Assignment::class,'id','step_id')->where('user_id',Auth::user()->id);
    }
}
