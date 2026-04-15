<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Image extends Model
{
    protected $fillable = ['id','unit_id','image'];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
