<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'dream_id',
        'user_id',
        'invitee_email',
        'qr_code',
    ];

    /**
     * Relacionamento com a tabela `dreams`.
     * Um convite pertence a um único sonho.
     */
    public function dream()
    {
        return $this->belongsTo(Dream::class);
    }

    /**
     * Relacionamento com a tabela `users`.
     * Um convite pertence a um único usuário (quem enviou o convite).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento com a tabela `cart_items`.
     * Um convite pode ter muitos itens de carrinho associados.
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
