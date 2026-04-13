<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $table = 'intros';
    protected $fillable = ['title_ar', 'title_en', 'description_ar', 'description_en', 'image_icon', 'image_background', 'link'];
}
