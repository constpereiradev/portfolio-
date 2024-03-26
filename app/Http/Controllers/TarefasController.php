<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    private $tarefa;

    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
    }

    public function index()
    {
        $tarefas = $this->tarefa::with('colaborador')->get();
        return response()->json([
            'tarefas' => $tarefas,
        ]);
    }

    public function store(Request $request){
        $this->tarefa->create($request->all());
    }

    public function show(Request $request){
        $tarefa = $this->tarefa->find($request->id);
        return $tarefa;
        
    }

    public function update(Request $request){
        $tarefa = $this->tarefa->find($request->id);
        $tarefa->status = 'Feito';
        $tarefa->save();
    }
}
