<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\User;

class Love extends Model
{
    protected $fillable = ['id','unit_id','user_id'];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
