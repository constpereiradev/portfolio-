<?php

namespace App\Models\FormModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'matricula',
        'funcao',
    ];
}
