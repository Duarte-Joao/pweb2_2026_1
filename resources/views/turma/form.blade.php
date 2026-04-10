@extends('main')
@section('titulo', 'Formulário Turma')
@section('conteudo')

@php
    $curso = isset($curso) ? $curso: request()->curso;
@endphp
    <h4>Formulário Turma - Curso: {{ $curso->nome ?? '' }}</h4>

    @php
        if (!empty($dado->id)) {
            $action = route('turma.update', $dado->id);
            $data_inicio = date('d/m/Y', strtotime($dado->data_inicio));
            $data_fim = date('d/m/Y', strtotime($dado->data_fim));
        } else {
            $action = route('turma.store');
        }
    @endphp

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (!empty($dado->id))
            @method('PUT')
        @endif
        <div class="row">
            <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">
            <input type="hidden" name="curso_id" value="{{ old('curso_id', $dado->curso_id ?? $curso->id) }}">
            <div class="col">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" name="codigo" value="{{ old('codigo', $dado->codigo ?? '') }}">
            </div>
            <div class="col">
                <label class="form-label" for="data_inicio">Data Início</label>
                <input type="date" class="form-control" name="data_inicio"
                    value="{{ old('data_inicio', $dado->data_inicio ?? '') }}">
            </div>
            <div class="col">
                <label class="form-label" for="data_fim">Data Fim</label>
                <input type="date" class="form-control" name="data_fim"
                    value="{{ old('data_fim', $dado->data_fim ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('curso.turmas', isset($dado) ? $dado->curso_id : $curso->id) }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>

@stop
