@extends('main')
@section('titulo',"Listagem de alunos")
@section('conteudo')

<h4>Listagem de Alunos</h4>

<div class="row">
    <div class="col">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label"></label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                        <option value="telefone">Telefone</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="forl-label">Valor</label>
                    <input type="text" class="form-control" name="valor" placeholder="Pesquisar...">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                <div class="col-md-3">
                    <a href="{{url('aluno/create')}}" class='btn btn-success'> Novo</a>
                </div>
            </div>
        </form>
    </div>
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Telefone</th>
    </tr>
  </thead>
  <tbody>
    @foreach($dados as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->cpf }}</td>
            <td>{{ $item->telefone }}</td></td>
        </tr>
    @endforeach
  </tbody>
</table>


@stop
