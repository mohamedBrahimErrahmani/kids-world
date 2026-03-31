<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $fillable = ['name', 'handle', 'platform', 'avatar_url', 'status'];

    public function affiliateVideos()
    {
        return $this->hasMany(AffiliateVideo::class);
    }
}
