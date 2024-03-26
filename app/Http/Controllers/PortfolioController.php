<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioController extends Controller
{
    
    public function index(){
        return Inertia::render('Portfolio/Index');
    }
   
    public function projetoLanding(){
        return Inertia::render('Portfolio/Landing');
    }

    public function projetoEcommerce(){
        return Inertia::render('Portfolio/Ecommerce');
    }
}
