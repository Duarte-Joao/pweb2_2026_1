<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Charts\QtdAlunoCurso;
use Barryvdh\DomPDF\Facade\Pdf;

class CursoController extends Controller
{
    function index()
    {
        $dados = Curso::all(); //select * from curso

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
            'carga_horaria.numeric' => "O :attribute é deve ser númerico",
        ]);
    }

    function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Curso::create($data);

        return redirect('curso')->with('success', 'Registro cadastrado com sucesso');
    }

    function edit($id)
    {
        $dado = Curso::find($id);

        return view('curso.form', [
            'dado' => $dado,
        ]);
    }

    function update(Request $request, $id)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Curso::find($id)->update($data);

        return redirect('curso')->with('success', 'Registro atualizado com sucesso');
    }

    function destroy($id)
    {
        $dado = Curso::find($id);
        if($dado->turmas->count() > 0){
            return redirect('curso')->with('error', 'Não é possível excluir o curso pois há turmas vinculadas a ela.');
        }

        $dado->delete();
        return redirect('curso')->with('success', 'Registro removido com sucesso');
    }

    function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Curso::where(
                $request->tipo,
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $dados = Curso::all();
        }

        return view('cursos.list', ['dados' => $dados]);
    }

    function chart(QtdAlunoCurso $chart){
        return view('curso.chart', ['chart'=>$chart->build()]);
    }

    public function report(){
        $cursos = Curso::orderBy('id')->get();

        $data = [
            'titulo' => 'Relatório Listagem de Cursos',
            'cursos' => $cursos,
            ];

        $pdf = Pdf::loadView('curso.report', $data);

        return $pdf->download('relatorio_listagem_aluno_curso.pdf');
    }
    public function reportMatriculados(){
        $cursos = Curso::with('alunos.categoria')->orderBy('id')->get();

        $data = [
            'titulo' => 'Relatório Matriculados por Curso',
            'cursos' => $cursos,
            ];

        $pdf = Pdf::loadView('curso.reportMatriculados', $data);

        return $pdf->download('relatorio_aluno_matriculados_por_curso.pdf');
    }
}
