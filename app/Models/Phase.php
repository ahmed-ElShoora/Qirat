<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Phase extends Model
{
    protected $fillable = ['id','unit_id','title_ar','title_en','description_ar','description_en','image'];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
