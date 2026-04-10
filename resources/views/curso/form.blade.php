@extends('main')
@section('titulo', 'Formulário Curso')
@section('conteudo')

    <h4>Formulário Curso</h4>

    @php
        if (!empty($dado->id)) {
            $action = route('curso.update', $dado->id);
        } else {
            $action = route('curso.store');
        }
    @endphp

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (!empty($dado->id))
            @method('PUT')
        @endif
        <div class="row">
            <input type="hidden" name="id" value="{{ $dado->id ?? '' }}">
            <div class="col">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col">
                <label for="requisito" class="form-label">Requisito</label>
                <input type="text" class="form-control" name="requisito"
                    value="{{ old('requisito', $dado->requisito ?? '') }}">
            </div>
            <div class="col">
                <label class="form-label" for="carga_horaria">Carga Horária</label>
                <input type="text" class="form-control" name="carga_horaria"
                    value="{{ old('carga_horaria', $dado->carga_horaria ?? '') }}">
            </div>
            <div class="col">
                <label class="form-label" for="valor">Valor</label>
                <input type="text" class="form-control" name="valor" value="{{ old('valor', $dado->valor ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('curso') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>

@stop
