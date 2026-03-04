<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{

    function index()
    {
        $dados = Aluno::all(); // é igual a SELECT * from aluno

        //dd($dados);

        return view('aluno.list', ['dados' => $dados]);
    }

    function create(){
        return view('aluno.form');
    }


    function store(Request $request)
    {
        //dd($request->all()); <--serve para debug

        $request->validate([
            'nome'=>'required',
            'cpf'=>'required',
        ],[
            'nome'=>"O :attribute é obrigatório",
            'cpf'=>"O :attribute é obrigatório",
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone
        ]);

        return redirect('aluno');

        //OU QUANDO TEM MUITA INFORMAÇÃO OU ALGO COM VALIDAÇÃO ESPECIFICA DA PRA USAR ESSE OUTRO
        /*OUTRO JEITO*/

        /*
        Aluno::create($request->all());
        return redirect('aluno');
        */

    }

    function destroy($id)
    {
        Aluno::destroy($id);
        return redirect('aluno');
    }

    function search(Request $request)
    {
        if(!empty($request->valor)){
            $dados = Aluno::where($request->tipo, 'like', '%'. $request->valor . '%')->get();
        }else{
            $dados = Aluno::all();
        }

        return view('aluno.list', ['dados' => $dados]);
    }
}
