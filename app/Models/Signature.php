<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Signature extends Model
{
    protected $fillable = ['id','name_ar','name_en','icon'];

    public function units(){
        return $this->belongsToMany(Unit::class);
    }
}
