<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class QtdAlunoCurso
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        /*SELECT c.nome, COUNT(1) AS qtd_alunos FROM matriculas m
	         INNER JOIN cursos c ON c.id = m.curso_id
	        GROUP BY c.nome --ele está agrupano por nome DO curso */

        $alunoPorCurso = DB::table('matriculas')
            ->join('curso','curso.id','=','matriculas.curso_id')
            ->seect('curso.nome','count(1) as qtd_alunos')
            ->groupBy('curso.nome')
            ->orderBy('total_alunos','desc');

        $qtdAlunos = [];
        $nomeCursos = [];

        foreach($alunoPorCurso as $item){
            dd($item);
        }

        return $this->chart->pieChart()
            ->setTitle('QTD Alunos por Curso.')
            ->setSubtitle('Season 2021.')
            ->addData([40, 50, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9']);
    }
}
