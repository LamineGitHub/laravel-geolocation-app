<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        'superficie',
        'description',
        'zone_id',
    ];

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function promoteurs(): BelongsToMany
    {
        return $this->belongsToMany(Promoteur::class);
    }
}
