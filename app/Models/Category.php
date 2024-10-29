<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = ['name'];

    // Relacionamento com Wish
    public function wishes()
    {
        return $this->hasMany(Wish::class);
    }

    // Relacionamento com Dream
    public function dreams()
    {
        return $this->hasMany(Dream::class);
    }
}
