<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // Defina os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'wish_id',
        'invitation_id',
        'price_at_addition',
        'added_by_user_id',
    ];

    /**
     * Relacionamento com o modelo Wish.
     */
    public function wish()
    {
        return $this->belongsTo(Wish::class);
    }

    /**
     * Relacionamento com o modelo Invitation.
     */
    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    /**
     * Relacionamento com o modelo User para o usuário que adicionou o item.
     */
    public function addedByUser()
    {
        return $this->belongsTo(User::class, 'added_by_user_id');
    }
}
