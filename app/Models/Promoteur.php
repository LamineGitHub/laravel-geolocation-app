<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promoteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'tel',
        'email',
        'bp',
    ];

    public function terrain(): BelongsToMany
    {
        return $this->belongsToMany(Terrain::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
