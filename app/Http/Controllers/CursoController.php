<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{

    function index()
    {
        $dados = Curso::all(); // é igual a SELECT * from curso

        return view('curso.list', ['dados' => $dados]);
    }

    function create()
    {
        return view('curso.form');
    }


    function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'requisito' => 'nullable|string',
            'carga_horaria' => 'nullable|numeric',
            'valor' => 'nullable|numeric',
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'requisito.string' => "O :attribute deve ser caractere",
            'carga_horaria.numeric' => 'O :attribute deve ser numérico',
        ]);
    }

    function store(Request $request)
    {
        //dd($request->all()); <--serve para debug

        $this->validateRequest($request);
        $data = $request->all();

        Curso::create($data);

        return redirect('curso');
    }

    function destroy($id)
    {
        Curso::destroy($id);
        return redirect('curso');
    }



    function edit($id)
    {
        $dado = Curso::find($id);

        return view('curso.form', ['dado' => $dado,]);
    }

    function update(Request $request, $id)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Curso::find($id)->update($data);

        return redirect('curso');
    }

    function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Curso::where($request->tipo, 'like', '%' . $request->valor . '%')->get();
        } else {
            $dados = Curso::all();
        }

        return view('curso.list', ['dados' => $dados]);
    }
}
