<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColaboradorRequest;
use App\Models\Colaborador;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class colaboradorController extends Controller
{
    private $colaborador;

    public function __construct(Colaborador $colaborador)
    {
        $this->colaborador = $colaborador;
    }

    public function index()
    {
        return Inertia::render('Colaboradores/Index', []);
    }

    public function pesquisarColaborador(Request $request)
    {
        try {
            $colaboradores = Colaborador::all();
            if ($request->nome != '') {
                $colaboradores = Colaborador::where('nome', 'LIKE', '%' . $request->nome . '%')
                ->get();
            } else if ($request->setor != '') {
                $colaboradores = Colaborador::where('setor', 'LIKE', '%' . $request->setor . '%')
                ->get();
            } else if ($request->status != '') {
                $colaboradores = Colaborador::where('status', 'LIKE', '%' . $request->status . '%')
                ->get();
            }
        } catch (\Exception $e) {
            $this->retornarException($e);
        }


        return response()->json([
            'colaboradores' => $colaboradores,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $this->colaborador->create($request->all());
        } catch (\Exception $exception) {
            //$this->retornarException($exception);
        }
    }

    public function show(Request $request)
    {
        $tarefas = Tarefa::with('colaborador')->get();
        $colaborador = $this->colaborador->find($request->id);
        return Inertia::render('Colaboradores/Visualizar', [
            'colaborador' => $colaborador,
            'tarefas' => $tarefas
        ]);
    }

    public function update(ColaboradorRequest $request)
    {
        try {
            $colaborador = $this->colaborador->find($request->id)->first();
            if ($colaborador) {
                $colaborador->nome = $request['nome'];
                $colaborador->cargo = $request['cargo'];
                $colaborador->setor = $request['setor'];
                $colaborador->salario = $request['salario'];
                $colaborador->status = $request['status'];
                $colaborador->save();
            }
        } catch (\Exception $exception) {
            $this->retornarException($exception);
        }
    }

    public function delete(Request $request)
    {
        try {
            $colaborador = $this->colaborador->find($request->id)->first();
            if ($colaborador) {
                $colaborador->delete();

                return response()->json([
                    'colaboradores' => $this->colaborador
                ]);
            }
        } catch (\Exception $exception) {
            $this->retornarException($exception);
        }
    }

    public function retornarException($exception)
    {
        return back()->with([
            'mensagem' => 'Não foi possível realizar a requisição.',
            'erro' => $exception
        ]);
    }
}
