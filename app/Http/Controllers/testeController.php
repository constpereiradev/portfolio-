<?php

namespace App\Http\Controllers;

use App\Http\Requests\TesteRequest;
use App\Models\Teste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testeController extends Controller
{
    private $teste;

    public function __construct(Teste $teste)
    {
        $this->teste = $teste;
    }

    public function index(Request $request)
    {
        try {
            $testes = $this->teste->todosOsDados();
            if ($request->busca != null) {
                $testes->where('nome', 'LIKE', '%' . $request->busca . '%');
            }
            return $testes->paginate(10);
        } catch (\Exception $exception) {
            $this->retornarException($exception);
        }
    }

    public function store(TesteRequest $request)
    {
        try {
            $this->teste()->create($request->validate());
        } catch (\Exception $exception) {
            $this->retornarException($exception);
        }
    }

    public function update(TesteRequest $request)
    {
        try {
            $teste = $this->teste->find($request->id);
            if ($teste) {
                $teste->update($request->only(
                    [
                        'nome',
                    ]
                ));
            }
        } catch (\Exception $exception) {
            $this->retornarException($exception);
        }
    }

    public function delete(Request $request)
    {
        try {
            $teste = $this->teste->find($request->id);
            if ($teste) {
                $teste->delete();
            };
        } catch (\Exception $exception) {
            $this->retornarException($exception);
        }
    }

    static function retornarException($exception)
    {
        return back()->with([
            'mensagem' => 'Não foi possível realizar a requisição.',
            'erro' => $exception
        ]);
    }
}
