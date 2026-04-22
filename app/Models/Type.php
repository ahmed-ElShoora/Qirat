<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Sell;

class Type extends Model
{
    protected $fillable = ['id','name_ar','name_en'];

    public function units(){
        return $this->hasMany(Unit::class);
    }

    public function sells()
    {
        return $this->hasMany(Sell::class, 'type_id');
    }
}
