<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class geradorCodigoBarrasController extends Controller
{
    public function gerarCodigoBarras(){
        $gerador = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $imagem = $gerador->getBarcode('081331723987', $gerador::TYPE_CODE_128);

        //Salvar imagem do código de barras
        Storage::put('codigobarras/codigo.png', $imagem);

        return response($imagem);
    }

    public function index(){
        return Inertia::render('CodigoDeBarras/Index');
    }
}
