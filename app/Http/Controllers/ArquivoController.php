<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{
    //Retorno de arquivo OK
    public function arquivos(){
        
        $directory = "public";

        try {
            $arquivos = Storage::allFiles($directory);

            return response()->json([
                'Arquivos: ' => $arquivos,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'Message: ' => 'Não foi possível realizar a requisição',
                'Erro: ' => $e,
            ], 500);
        }
       
    }

    //Upload de arquivo OK
    public function upload(Request $request){
        
        try {

            $imagem = $request->file('imagem');
            $arquivo = $request->file('arquivo');


            //storage/app
            $imagem_urn = $imagem->store('imagens', 'public');
            $arquivo_urn = $arquivo->store('arquivos', 'public');

            return response()->json([
                'Message: ' => 'Success',
                'Imagem: ' => $imagem_urn,
                'Outro arquivo' => $arquivo_urn,
            ], 200); 

        } catch (\Exception $e) {
            return response()->json([
                'Message: ' => 'Não foi possível realizar a requisição',
                'Erro: ' => $e,
            ], 500); 
        }
        
    }

    public function update(Request $request, $id){

        try {
            
            $arquivo_id = Arquivo::find($id);

            $imagem = $request->file('imagem');
            $arquivo = $request->file('arquivo');

            $imagem_urn = $imagem->store('imagens', 'public');
            $arquivo_urn = $arquivo->store('arquivos', 'public');

            $arquivo_id->update([
                'imagem' => $imagem_urn,
                'arquivo' =>  $arquivo_urn,
            ]);

            return response()->json([
                'Message: ' => 'Atualização realizada com sucesso',
                'Arquivo: ' => $arquivo_id,
            ], 200);
            
        } catch (\Exception $e) {
            
            return response()->json([
                'Message: ' => 'Não foi possível realizar a requisição',
                'Erro: ' => $e,
            ], 500);
        }

    }

    public function show($id){

        try {
            $arquivo = Arquivo::find($id);

            return response()->json([
                'Message: ' => 'Requisição realizada com sucesso',
                'Arquivo: ' => $arquivo,
            ], 200);
        } catch (\Exception $e) {
            
            return response()->json([
                'Message: ' => 'Não foi possível realizar a requisição',
                'Erro: ' => $e,
            ], 500);
        }

    }
    //
    public function destroy($id){

        try {
            $arquivo = Arquivo::find($id);
            $arquivo->delete();

            return response()->json([
                'Message: ' => 'Requisição realizada com sucesso',
                'Arquivo: ' => $arquivo,
            ], 200);
        } catch (\Exception $e) {
            
            return response()->json([
                'Message: ' => 'Não foi possível realizar a requisição',
            ], 500);
        }

    }
}
