<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiController extends Controller
{
    //

    public function formulario(){
        Inertia::render('Axios/Api');
    }
}
