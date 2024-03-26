<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tipoTransacao;

class Bandeira extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function tipoTransacaos()
    {
        return $this->hasMany(tipoTransacao::class);
    }

    public function transacaos()
    {
        return $this->hasMany(Transacao::class);
    }

}
