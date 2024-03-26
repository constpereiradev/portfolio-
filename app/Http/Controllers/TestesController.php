<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TestesController extends Controller
{
    public function index(){
        return Inertia::render('Padroes/Tabela');
    }

    public function tipoDocumento(){
        return Inertia::render('Padroes/TipoDocumento');
    }

    public function itemSolto(){
        return Inertia::render('Padroes/ItemSolto');
    }
    /*
    Deletar tipo de documento

    public function destroy($id)
    {
        try {
            $tipoDocumento = TipoDocumento::destroy($id);
            return response()->json([
                'Mensagem:' => 'Documento deletado com sucesso.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'Mensagem:' => 'Não foi possível deletar o documento',
                'Erro: ' => $e,
            ]);
        }

    }

    Atualizar tipo de documento
    public function update(Request $request, $id)
    {

        $tipoDocumento = TipoDocumento::find($id);

        $tipoDocumento->nome = $request['nome'];
        $tipoDocumento->save();

        return Inertia::render('Padroes/Tabela', [
            
            'tipoDocumento' => TipoDocumento::all();
        ]);
    }

    */
}
