@extends('main')
@section('titulo', 'Formulário Aluno')
@section('conteudo')

    <h4>Formulário Aluno</h4>

    @php
        if (!empty($dado->id)) {
            $action = route('aluno.update', $dado->id);
        } else {
            $action = route('aluno.store');
        }
    @endphp


    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf <!--camada de segurança para o formulário-->
        @if (!empty($dado->id))
            @method('PUT')
        @endif
        <div class="row">
            <input type="hidden" name="id" value="{{ $dado->id ?? '' }}">
            <div class="col">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
                <!--?? é um if do laravel-->
            </div>
            <div class="col">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone"
                    value="{{ old('telefone', $dado->telefone ?? '') }}">
            </div>
            <div class="col">
                <label class="form-label" for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" value="{{ old('cpf', $dado->cpf ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label" for="categoria_id">Categoria</label>
                <select name="categoria_id" class="form-select">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}"
                            {{ old('categoria_id', $dado->categoria_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label" for="imagem">Imagem</label>
                @php
                    $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.png';
                @endphp
                <img src="/storage/{{ $nome_imagem }}" calss="rounded-circle" width="200px" height="200px" alt="imagem">
                <input type="file" name="imagem" class="form-control" value="{{ old('imagem', $dado->imagem ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('aluno') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>

@stop
