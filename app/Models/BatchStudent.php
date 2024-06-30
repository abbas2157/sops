<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchStudent extends Model
{
    use HasFactory;
    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id','id')->select('id','title','type');
    }
}
