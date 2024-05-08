<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory, SoftDeletes;
    public function step()
    {
        return $this->belongsTo(ModuleStep::class,'step_id','id')->select('id','type','steps_no','title','video','assignment');
    }
}
