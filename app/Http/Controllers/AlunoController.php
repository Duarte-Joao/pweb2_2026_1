<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\CategoriaAluno;

class AlunoController extends Controller
{

    function index()
    {
        $dados = Aluno::all(); // é igual a SELECT * from aluno

        //dd($dados);

        return view('aluno.list', ['dados' => $dados]);
    }

    function create(){
        $categorias = CategoriaAluno::orderBy('nome')->get();

        return view('aluno.form', ['categorias' => $categorias]);
    }


    function validateRequest(Request $request){
        $request->validate([
            'nome'=>'required',
            'cpf'=>'required',
            'categoria_id'=>'required',
            'imagem'=> 'nullable|image|mimes:png,jpg,jpeg'
        ],[
            'nome.required'=>"O :attribute é obrigatório",
            'cpf.required'=>"O :attribute é obrigatório",
            'categoria_id.required'=>'O :attribute é obrigatório',
            'imagem.image'=> "O :attribute deve ser enviado",
            'imagem.mimes'=> "O :attribute deve ser das extensões: PNG, JPEG e JPG",
        ]);
    }

    function store(Request $request)
    {
        //dd($request->all()); <--serve para debug

        $this->validateRequest($request);

        Aluno::create($request->all());
        return redirect('aluno');


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

    function edit($id)
    {
        $dado = Aluno::find($id);
        $categorias = CategoriaAluno::orderBy('nome')->get();

        return view('aluno.form', ['dado' => $dado, 'categorias' => $categorias]);
    }

    function update(Request $request, $id)
    {
        $this->validateRequest($request);

        Aluno::find($id)->update($request->all());

        return redirect('aluno');
    }
}
