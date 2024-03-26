<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filme extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'sinopse',
        'status',
        'favoritado',
        'genero',
        'categoria',
        'url',
        'lista_id'
    ];

    public function listas()
    {
        return $this->belongsTo(Lista::class);
    }
}
