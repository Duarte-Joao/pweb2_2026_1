@extends('main')
@section('titulo',"Formulário Aluno")
@section('conteudo')

<h4>Formulário Aluno</h4>

<form>
    <div class="row">
        <div class="col">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="col">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone">
        </div>
        <div class="col">
            <label class="form-label" for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{url('aluno')}}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</form>

@stop