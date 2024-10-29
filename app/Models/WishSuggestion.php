<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WishSuggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'wish_id',
        'suggested_product_name',
        'suggested_price',
        'suggested_store'
    ];

    /**
     * Relação com o modelo Wish
     */
    public function wish()
    {
        return $this->belongsTo(Wish::class);
    }
}
