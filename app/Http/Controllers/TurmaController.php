<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Curso;

class TurmaController extends Controller
{

    function index(Curso $curso)
    {
        $dados = $curso->turmas; // é igual a SELECT * from turme where curso_id = $curso->id

        return view('turma.list', [
            'dados' => $dados,
            'curso' => $curso
            ]);
    }

    function create(Curso $curso)
    {
        return view('turma.form', ['curso, $curso']);
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

        $turma = Turma::create($data);

        return redirect()->route('curo.turmas', $turma->curso_id);
    }

    function update(Request $request, $id)
    {
        $this->validateRequest($request);
        $data = $request->all();

        $turma = Turma::find($id)->update($data);

        return redirect()->route('curso.turmas', $turma->curso_id);
    }

    function destroy($id)
    {
        $dado = Turma::findOrfail($id);
        $dado->delete();

        return redirect()->route('curso.turmas', $dado->curso_id);
    }

    function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Turma::where($request->tipo, 'like', '%' . $request->valor . '%')->get();
        } else {
            $dados = Turma::all();
        }

        return view('turma.list', ['dados' => $dados]);
    }

    function edit($id)
    {
        $dado = Turma::find($id);
        $curso = Curso::orderBy('nome')->get();

        return view('turma.form', [
            'dado' => $dado,
            'curso' => $curso,
            ]);
    }
}
