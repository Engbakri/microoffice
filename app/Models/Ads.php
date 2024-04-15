<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'ads_title',
        'ads_desc',
        'ads_image',
        'ads_userid'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
