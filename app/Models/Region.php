<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'superficie'
    ];

    public function zones(): HasMany
    {
        return $this->hasMany(Zone::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
