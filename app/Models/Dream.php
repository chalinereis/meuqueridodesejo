<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dream extends Model
{
    use HasFactory;

    // Proteção contra mass assignment
    protected $fillable = ['title', 'user_id', 'category_id', 'price_range_min', 'price_range_max'];

    // Confirmação de uso de timestamps
    public $timestamps = true;

    // Relacionamento com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento muitos-para-muitos com Wish
    public function wishes()
    {
        return $this->belongsToMany(Wish::class, 'dream_wishes')->withPivot('priority');
    }

    // Relacionamento com Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
