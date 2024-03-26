<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Lista;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class StreamController extends Controller
{
    public function index()
    {
        $filmes = Filme::all();

        return Inertia::render('Projetos/Stream/Index', [
            'filmes' => $filmes,
        ]);
    }

    public function apiFilmes()
    {
        $filmes = Filme::paginate(12);
        return response()->json([
            'filmes' => $filmes
        ]);
    }

    public function dashboard()
    {
        //Consulta que retorna todos os filmes
        $sql = 'SELECT * FROM amanda_banco.dbo.filmes';
        $dadosFilmes = DB::connection('sqlsrv')->select($sql);


        //Consulta que retorna filmes cadastrados no período de 7 dias
        $dataInicio = Carbon::now()->subDays(7);
        $dataFim = Carbon::now();

        $sql = "SELECT * FROM amanda_banco.dbo.filmes
        WHERE 
            created_at >= '$dataInicio' AND created_at <= '$dataFim'";
        $dadosTempo = DB::connection('sqlsrv')->select($sql);
        
        $filmes = Filme::all();
        $listas = Lista::all();
        return Inertia::render('Projetos/Stream/Dashboard', [
            'filmes' => $filmes,
            'listas' => $listas,
            'chartFilmes' => $this->chartFilmes($dadosFilmes),
            'chartTempo' => $this->chartTempo($dadosTempo),
        ]);
    }

    public function cadastrarFilme(Request $request)
    {
        Filme::create($request->all());
    }

    public function pesquisar(Request $request)
    {
        $dados = Filme::where('sinopse', 'like', '%' . $request->pesquisa . '%');
        return response()->json([
            'resultado' => $dados,
        ]);
    }

    public function visualizarFilme(Request $request)
    {
        $filme = Filme::find($request->id);
        $listas = Lista::all();
        return Inertia::render('Projetos/Stream/Filme', [
            'filme' => $filme,
            'listas' => $listas,
        ]);
    }

    public function deletarFilme(Request $request){
        $filme = Filme::find($request->id);
        $filme->delete();
    }
    public function favoritarFilme(Request $request)
    {
        $filme = Filme::find($request->id);
        $filme->favoritado = true;
        $filme->save();

        return response()->json([
            'filme' => $filme,
        ]);
    }

    public function removerFavoritoFilme(Request $request)
    {
        $filme = Filme::find($request->id);
        $filme->favoritado = null;
        $filme->save();

        return response()->json([
            'filme' => $filme,
        ]);
    }

    public function cadastrarLista(Request $request)
    {

        $lista = Lista::create($request->all());

        return response()->json([
            'lista' => $lista
        ]);
    }

    public function apiListas()
    {
        $listas = Lista::all();

        return response()->json([
            'listas' => $listas
        ]);
    }

    public function adicionarFilmeLista(Request $request)
    {
        $lista = Lista::find($request->listaId);
        $filme = Filme::find($request->filmeId);

        $lista->nome = $filme;
        $lista->save();
    }


    static function chartFilmes($dados)
    {
        if($dados != null){
            for ($i = 0; $i < count($dados); $i++) {

                $arrayDados[] = (object) [
                    'filmes' => $dados[$i],
                    'favoritados' =>$dados[$i]->favoritado,
                    'status' =>$dados[$i]->status,
                ];
            }
    
            $collectDados = array_values(collect($arrayDados)->all());
            for ($i = 0; $i < count($collectDados) ; $i++) { 
    
               $filmes[] = $collectDados[$i]->filmes;
    
               if($collectDados[$i]->favoritados != null){
                    $filmesFavoritados[] = $collectDados[$i]->favoritados;
               }
               if($collectDados[$i]->status === 'Status'){
                    $filmesAssistidos[] = $collectDados[$i]->status;
                }
            }
            /*
            $filmes = Filme::all();
            $dadosAgrupados = $filmes->groupBy('titulo');
    
            $titulosFilme = [];
    
            foreach ($dadosAgrupados as $tipo => $grupo) {
                $titulosFilme[$tipo] = $grupo->count();
            }
            */
    
            $quantidadeFilme[] = count($filmes);
    
    
            $chartGeral = (object) [
                'series' => [
                    [
                        'name' => 'Favoritados',
                        'type' => 'column',
                        'data' => $filmesFavoritados
                    ],
                    [
                        'name' => 'Assistdos',
                        'type' => 'column',
                        'data' => $filmesAssistidos
                    ],
                ],
                'chartOptions' => [
                    'chart' => [
                        'height' => 350,
                        'type' => 'line',
                    ],
                    'stroke' => [
                        'width' => [2, 4]
                    ],
                    'dataLabels' => [
                        'enabled' => false,
                    ],
                ],
            ];
    
            $chartTotal = (object) [
                'series' => [
                    [
                        'name' => 'Quantidade',
                        'type' => 'column',
                        'data' => $quantidadeFilme
                    ],
                ],
                'chartOptions' => [
                    'chart' => [
                        'height' => 350,
                        'type' => 'line',
                    ],
                    'stroke' => [
                        'width' => [2, 4]
                    ],
                    'dataLabels' => [
                        'enabled' => false,
                    ],
                ],
            ];
    
            return (object) [
                'chartFilmes' => $chartGeral,
                'chartTotal' => $chartTotal
            ];
        }

        
    }

    static function chartTempo($dados){

        $quantidade[] = count($dados);

        return $obj = (object) [
            'series' => [
                [
                    'name' => 'Favoritados',
                    'type' => 'column',
                    'data' => $quantidade
                ],
            ],
            'chartOptions' => [
                'chart' => [
                    'height' => 350,
                    'type' => 'line',
                ],
                'stroke' => [
                    'width' => [2, 4]
                ],
                'dataLabels' => [
                    'enabled' => false,
                ],
            ],
        ];

    }


}
