<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testeControllerStub extends Controller

{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        try {
            $models = $this->model->todosOsDados();
            if ($request->busca != null) {
                $models->where('nome', 'LIKE', '%' . $request->busca . '%');
            }
            return $models->paginate(10);
        } catch (\Exception $exception) {
            $this->retornarException($exception);
        }
    }

    public function store(ModelRequest $request)
    {
        try {
            $this->model()->create($request->validate());
        } catch (\Exception $exception) {
            $this->retornarException($exception);
        }
    }

    public function update(ModelRequest $request)
    {
        try {
            $model = $this->model->find($request->id);
            if ($model) {
                $model->update($request->only(
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
            $model = $this->model->find($request->id);
            if ($model) {
                $model->delete();
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
