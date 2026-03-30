<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductAnalytics extends Model
{
    protected $table = 'product_analytics';

    protected $fillable = ['product_id', 'date', 'clicks_count', 'conversions_count', 'revenue'];

    protected $casts = [
        'date' => 'date',
        'revenue' => 'decimal:2',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
