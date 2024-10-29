<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = ['name', 'price', 'category_id'];

    // Relacionamento muitos-para-muitos com Dream
    public function dreams()
    {
        return $this->belongsToMany(Dream::class, 'dream_wishes')->withPivot('priority');
    }

    // Relacionamento com Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relacionamento com WishSuggestion (sugestões de produtos)
    public function suggestions()
    {
        return $this->hasMany(WishSuggestion::class);
    }

    // Relacionamento com CartItem (itens do carrinho relacionados ao wish)
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
