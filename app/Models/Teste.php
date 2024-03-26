<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class Teste extends Model
{
    use HasFactory;

    protected $table = 'teste';
    protected $fillable = [
        'nome',
    ];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y',
    ];

    public function todosOsDados(){
        try {
            return DB::table('teste')->oldest();
        } catch (\Exception $exception) {
            return $exception;
        }
        
    }
    

}
