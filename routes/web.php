<?php

use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FormConfigController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\APIUteisController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ArquivoController;
use App\Http\Controllers\colaboradorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinancasController;
use App\Http\Controllers\geradorCodigoBarrasController;
use App\Http\Controllers\geradorQrcode;
use App\Http\Controllers\geradorQrcodeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MonitorMecaluxController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\testeController;
use App\Http\Controllers\TestesController;
use App\Models\MonitorMecalux;
use App\Models\Paciente;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use PhpParser\Node\Arg;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//rotas de formulário
require 'form.php';

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', fn () => Inertia::render('Dashboard'))->name('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->controller(PushNotificationController::class)->group(function () {
    Route::get('API/notificacao/todas', 'index')->name('notifications.all');
    Route::get('/notificacao/usuario/deletar/{id}', 'delete')->name('notifications.delet');
    Route::get('/notificacao/usuario/limparTudo', 'deleteAll')->name('notifications.clear');
    Route::get('/notificacao/formularios', 'opemTask')->name('notifications.opemTask');
});

//Rotas gerais de formulários
Route::middleware(['auth:sanctum', 'verified'])->controller(FormController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('forms.dashboard');
    Route::get('/formularios', 'index')->name('forms.index');
    Route::get('/form/ver/{id}', 'show')->name('form.view');
    Route::post('/form/destroy/{id}', 'destroy')->name('form.destroy');
    //rotas de API para uso do Axios
    Route::get('/API/allForms', 'allForms')->name('api.forms.allFormsList');
});

//Configurações de formulário
Route::middleware(['auth:sanctum', 'verified'])->controller(FormConfigController::class)->group(function () {
    Route::get('/formulario/configuracoes', 'index')->name('form.config');
    Route::post('/formulario/criar', 'store')->name('form.config.store');
    Route::get('/formulario/configuracao/{id}', 'configView')->name('form.config.config');
    Route::post('/formulario/criarTarefa', 'storeTask')->name('form.config.create');
    Route::get('/formulario/deletaTarefa/{id}', 'delet')->name('form.config.delet');
    Route::post('/formulario/editar', 'edit')->name('form.config.edit');
});


//Rotas de administração de usuário master
Route::middleware(['auth:sanctum', 'verified'])->controller(AllUsersController::class)->group(function () {
    Route::get('/usuarios/master', 'index')->name('usuarios.master');
    Route::post('/usuarios/store', 'store')->name('usuarios.store');
    Route::get('/usuario/bloquear/{id}', 'block')->name('usuarios.bloquear');
    Route::get('/logoutUser', 'logout')->name('deslogar');
    //modo escuro
    Route::get('/darkMode', 'darkMode')->name('darkMode');
});

//Rotas APIS uteis
Route::middleware(['auth:sanctum', 'verified'])->controller(APIUteisController::class)->group(function () {
    Route::get('/API/usuarios', 'usuarios')->name('API.utei.usuarios');
    Route::get('/API/roles', 'roles')->name('API.utei.roles');
    Route::get('/API/funcionarios', 'funcionarios')->name('API.utei.funcionarios');
});


Route::middleware(['auth:sanctum', 'verified'])->controller(TestesController::class)->group(function () {
    //Tabela
    Route::get('/tabela', 'index')->name('tabela.index');
    //Tela 1
    Route::get('/tipo/documento', 'tipoDocumento')->name('tipo.documento.tela1');

    //Deletar tipo de documento
    Route::post('/delete/tipo/documento/{id}', 'destroy')->name('tipo.documento.destroy');
    //Update
    Route::post('/update/tipo/documento/{id}', 'update')->name('tipo.documento.update');
});

Route::middleware(['auth:sanctum', 'verified'])->controller(geradorCodigoBarrasController::class)->group(function () {
    Route::get('/gerador/codigo/barras', 'index')->name('codigo.barras.index');
    Route::get('/gerar/codigo/barras', 'gerarCodigoBarras')->name('gerar.codigo.barras');
});

Route::middleware(['auth:sanctum', 'verified'])->controller(geradorQrcodeController::class)->group(function () {
    Route::get('/gerador/qrcode', 'index')->name('qrcode.index');
    Route::get('/gerar/qrcode', 'gerarQrCode')->name('qrcode.gerar');
});

Route::middleware(['auth:sanctum', 'verified'])->controller(colaboradorController::class)->group(function () {
    Route::get('/colaboradores', 'index')->name('colaborador.index');
    Route::post('/pesquisar/colaborador', 'pesquisarColaborador')->name('colaborador.pesquisar');
    Route::get('/visualizar/colaborador', 'show')->name('colaborador.show');
    Route::post('/cadastrar/colaborador', 'store')->name('colaborador.store');
    Route::post('/editar/colaborador', 'update')->name('colaborador.update');
    Route::post('/deletar/colaborador', 'delete')->name('colaborador.delete');
});


Route::middleware(['auth:sanctum', 'verified'])->controller(TarefasController::class)->group(function () {
    Route::get('/tarefas', 'index')->name('tarefa.index');
    Route::post('/cadastrar/tarefa', 'store')->name('tarefa.store');
    Route::get('/visualizar/tarefa', 'show')->name('tarefa.show');
    Route::post('/editar/tarefa', 'update')->name('tarefa.update');
});



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/portfolio', function () {
        return Inertia::render('Portfolio/Index');
    });
    Route::get('/portfolio/landing', function () {
        return Inertia::render('Portfolio/Landing');
    })->name('portfolio.landing');;
});
