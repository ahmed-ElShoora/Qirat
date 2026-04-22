<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Sell extends Model
{
    protected $fillable = [
        'id',
        'name',
        'phone',
        'address',
        'type_id',
        'location',
        'price',
        'sqm',
        'description',
        'status',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
