<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Form;
use App\Models\Approver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Forms\Functions;

class FuncionariosController extends Controller
{
    
    private $functions;
    //

    public function __construct()
    {
        //inicia as funções
        $this->functions = new Functions;
        $this->functions->model = 'Funcionario';
        $this->functions->formInfo = Form::where('slung', 'FormularioFuncionarios')->with('fluxo')->first();
        //$this->functions->childs = 'FormModeloFilho';
    }

    public function index()
    {
        if ($this->functions->formInfo) {
            $now = Carbon::now();

            $formOpem = (object)[
                "usuarioAbertura" => auth()->user()->name,
                "dataAbertura" => $now->format('Y') . '-' . $now->format('m') . '-' . $now->format('d'),
                'nome' => '',
                'matricula' => '',
                'funcao' => '',
                //camposPadrao
                "id" => null,
                'form_number' => '',
                'create_user_id' => '',
                'form_id' => '',
                'status' => '',
                "childs" => [],
                "aprovacao" => [],
                "historico" => [],
            ];

            return Inertia::render(
                'FormFluig/' . $this->functions->formInfo->slung . '/Form',
                [
                    'formInfo' => $this->functions->formInfo,
                    'formOpem' => $formOpem,
                    'atualTask' => null,
                    'readonlyVerific' => false,
                ]
            );
        } else {
            return back()->with([
                'title' => 'Erro',
                'message' => 'Formulário não existe.',
                'type' => 'alert-danger'
            ]);
        }
    }

    public function show($id)
    {
        if (true) {
            $atualTask = Approver::where('form_number', $id)->orderBy('ordem', 'asc')->where('status', '1')->first();

            $formOpem = ucfirst(strtolower('App\Models\FormModels\\' . $this->functions->model))::where('form_number', $id)
                ->with(
                    'formulario',
                    'aprovacao',
                    'aprovacao.userApprover',
                    'aprovacao.userCreate',
                    //'aprovacao.groupDetail',
                    'historico'
                )->first();

            if ($formOpem == null) {
                return back()->with([
                    'title' => 'Formulário não existe',
                    'message' => 'O fomulário que você está tentando acessar ou não existe ou não tem autorização para acessar.',
                    'type' => 'alert-danger'
                ]);
            }

            $approver = $this->functions->verificaApprover($atualTask);
            $view = $this->functions->verificaView($formOpem);

            if ($view ||  $approver) {
                return Inertia::render(
                    'FormFluig/' . $this->functions->formInfo->slung . '/Form',
                    [
                        'formInfo' => $this->functions->formInfo,
                        'formOpem' => $formOpem,
                        'atualTask' => $atualTask,
                        'condicaoPagamento' => [],
                        'approver' => $approver,
                        'formNumber' => $id,
                        'readonlyVerific' => ($formOpem->status == 2 && Auth()->user()->id == $formOpem->create_user_id) ? false : true,
                        'clientes' => [],

                        //datasets
                        'secoes' => [],
                        'cargos' => [],
                        'funcionarios' => [],
                    ]
                );
            } else {
                return back()->with([
                    'title' => 'Formulário não existe',
                    'message' => 'O fomulário que você está tentando acessar ou não existe ou não tem autorização para acessar.',
                    'type' => 'alert-danger'
                ]);
            }
        }

        return back()->with([
            'title' => 'Ação ilegal',
            'message' => 'Você não tem autorização para fazer isso.',
            'type' => 'alert-danger'
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        return back()->with([
            'title' => 'Formulário salvo com sucesso!',
            'form' => true,
            'form_number' => $this->functions->store($request)
        ]);
    }

    public function update(Request $request)
    {
        $this->validation($request);
        $this->functions->update($request);

        return back()->with([
            'title' => 'Formulário enviado para aprovação com sucesso!',
            'form' => true,
            'form_number' => $this->functions->update($request)
        ]);
    }

    public function toAprove(Request $request)
    {
        $update = $this->functions->toAprove($request);

        if ($update != false) {
            return back()->with([
                'title' => 'Formulário aprovado com sucesso!',
                'form' => true,
                'form_number' => $update
            ]);
        }

        return back()->with([
            'title' => 'Erro ao executar tarefa',
            'message' => 'Ouve um erro ao realizar essa tarefa, tente novamente.',
            'type' => 'alert-danger'
        ]);
    }

    public function toCancel(Request $request)
    {
        $cancel = $this->functions->toCancel($request);

        if ($cancel != false) {
            return back()->with([
                'title' => 'Formulário cancelado!',
                'form' => true,
                'form_number' => $cancel
            ]);
        }

        return back()->with([
            'title' => 'Erro ao executar tarefa',
            'message' => 'Ouve um erro ao realizar essa tarefa, tente novamente.',
            'type' => 'alert-danger'
        ]);
    }

    public function toRevise(Request $request)
    {
        $revise = $this->functions->toRevise($request);
        if ($revise != false) {
            return back()->with([
                'title' => 'Formulário enviado para revisão!',
                'form' => true,
                'form_number' => $revise
            ]);
        }

        return back()->with([
            'title' => 'Erro ao executar tarefa',
            'message' => 'Ouve um erro ao realizar essa tarefa, tente novamente.',
            'type' => 'alert-danger'
        ]);
    }

    public function toPdf($id)
    {
        $atualTask = Approver::where('form_number', $id)->orderBy('ordem', 'asc')->where('status', '1')->first();
        $formOpem = ucfirst(strtolower('App\Models\FormModels\\' . $this->functions->model))::where('form_number', $id)
            ->with(
                'formulario',
                'aprovacao',
                'aprovacao.userApprover',
                'aprovacao.userCreate',
                'historico',
                'childs',
                'childs.childs'
            )->first();

        return view('pdf.' . $this->functions->formInfo->slung, [
            'data' => $formOpem,
            'atual_task' => $atualTask,
            'logo' => asset('img\logo-bomix.png'),
        ]);
    }

    static function validation($request)
    {
        Validator::make($request->all(), [
            "dataAbertura" => 'required',
            'solicitante' => 'required',
            'chapaSolicitante' => 'required',
            'seila' => 'integer|required',
        ], [
            "dataAbertura.required" => 'Preencha a data de abertura',
            'solicitante.required' => 'Preencha o solicitante',
            'chapaSolicitante.required' => 'Falta a chapa do solicitanteF',
            'seila.required' => 'Sei la cara',
            'seila.integer' => 'O campo de ser um numero',
        ])->validate();
    }
}
