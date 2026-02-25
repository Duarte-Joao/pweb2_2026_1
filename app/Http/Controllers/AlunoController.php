<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{

    function index(){

        
        return view('aluno.list');
    }

}
