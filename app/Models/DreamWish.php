<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DreamWish extends Model
{
    protected $table = 'dream_wishes'; // Nome da tabela
    // Public $timestamps = true; // Deixe assim se você deseja rastrear timestamps

    protected $fillable = [
        'dream_id',
        'wish_id',
        'priority',
    ];

    /**
     * Relação com o modelo Dream.
     */
    public function dream(): BelongsTo
    {
        return $this->belongsTo(Dream::class);
    }

    /**
     * Relação com o modelo Wish.
     */
    public function wish(): BelongsTo
    {
        return $this->belongsTo(Wish::class);
    }
}
