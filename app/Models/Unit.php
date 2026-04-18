<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Developer;
use App\Models\Signature;
use App\Models\Love;
use App\Models\Image;
use App\Models\Phase;

class Unit extends Model
{
    protected $fillable = [
        'id',
        'title_ar',
        'title_en',
        'sqm',
        'address_ar',
        'address_en',
        'primary_image',
        'type_id',
        'developer_id',
        'other_type',
        'developer_price',
        'project_state',
        'resale_price',
        'phone_number',
        'whatsapp',
        'lat',
        'lng',
        'bed_number',
        'bathroom_number',
        'down_payment_percentage',
        'master_plan',
        'digital_brochure',
        'pay_amount_per_years',
        'payment_percentage_per_year',
        'is_promotion',
        'is_hide',
        'years_count'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function developer(){
        return $this->belongsTo(Developer::class);
    }

    public function signatures(){
        return $this->belongsToMany(Signature::class);
    }

    public function loves(){
        return $this->hasMany(Love::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function phases(){
        return $this->hasMany(Phase::class);
    }
}
