<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kyc extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'status',
        'type',
        'front_id',
        'back_id',
        'selfie',
        'cv',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'instagram_link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
