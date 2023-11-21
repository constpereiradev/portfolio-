<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FinancasController extends Controller
{
    public function index(){

        //landing page
    }

    public function carteira(){
        return Inertia::render('Financas/Carteira');
    }

    public function extrato(){
        return Inertia::render('Financas/Extrato');
    }

    public function despesas(){

        return Inertia::render('Financas/Despesas');
    }

    public function cartoes(){
        return Inertia::render('Financas/Cartoes');
    }

    public function cartao(){
        return Inertia::render('Financas/Cartao');
    }
}

