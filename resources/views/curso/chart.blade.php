@extends('main')
@section('titulo', 'Gráfic QTD Alunos por Curso')
@section('conteudo')

    <h4>Gráfico QTD Aunos por Curso</h4>

    <div class="container px-4 mx-auto">

        <div class="p-6 m-20 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>

    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}


@stop
