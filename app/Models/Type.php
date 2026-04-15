<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Type extends Model
{
    protected $fillable = ['id','name_ar','name_en'];

    public function units(){
        return $this->hasMany(Unit::class);
    }
}
