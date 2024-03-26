<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpParser\Node\Stmt\Return_;

class EmpresaController extends Controller
{
    
    public function index(){
        return Inertia::render('Empresa/Index');
    }
}
