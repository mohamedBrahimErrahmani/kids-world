<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TiktokVideo extends Model
{
    protected $fillable = [
        'title',
        'tiktok_url',
        'thumbnail_path',
        'views_count',
        'clicks_count',
        'engagement_rate',
        'posted_at',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'engagement_rate' => 'float',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
