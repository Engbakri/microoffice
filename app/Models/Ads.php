<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ads extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'ads_title',
        'ads_desc',
        'ads_image',
        'ads_userid'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'ads_userid','id');
    }
}
