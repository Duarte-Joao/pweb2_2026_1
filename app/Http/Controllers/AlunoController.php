<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{

    function index(){


        return view('aluno.list');
    }

    function create(){
        Aluno::create([
            'nome' => 'João',
            'email' => '123.456.789-00',
            'telefone' => '123456789'
        ]);

        return view('aluno.create');
    }

}
