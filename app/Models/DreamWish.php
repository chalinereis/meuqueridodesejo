<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DreamWish extends Model
{
    protected $table = 'dream_wishes'; // Nome da tabela
    public $timestamps = false; // Caso a tabela não tenha timestamps

    protected $fillable = [
        'dream_id',
        'wish_id',
        'priority'
    ];

    /**
     * Relação com o modelo Dream.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dream(): BelongsTo
    {
        return $this->belongsTo(Dream::class);
    }

    /**
     * Relação com o modelo Wish.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wish(): BelongsTo
    {
        return $this->belongsTo(Wish::class);
    }
}
