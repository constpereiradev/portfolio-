<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradores';
    protected $fillable = [
        'nome',
        'cargo',
        'salario',
        'setor',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];

    public function tarefas(): HasMany
    {
        return $this->hasMany(Colaborador::class);
    }
}
