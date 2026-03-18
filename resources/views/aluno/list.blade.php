@extends('main')
@section('titulo',"Listagem de alunos")
@section('conteudo')

<h4>Listagem de Alunos</h4>

<div class="row">
    <div class="col">
        <form action="{{route('aluno.search')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label"></label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                        <option value="telefone">Telefone</option>
                        <option value="telefone">Ação</option>
                        <option value="telefone">Ação</option>
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
      <th scope="col">Imagem</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Telefone</th>
      <th scope="col">Categoria</th>
    </tr>
  </thead>
  <tbody>
    @foreach($dados as $item)
        @php
            $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.php';
        @endphp

        <tr>
            <th scope="row">{{$item->id}}</th>
            <td> <img src="/storage/{{ $nome_imagem }}" class="reounded-circle" width="150px" height="150px" alt="imagem">

            </td>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->cpf }}</td>
            <td>{{ $item->telefone }}</td>
            <td>{{ $item->categoria_id->nome ?? ''}}</td>
            <td><a href="{{route('aluno.edit', $item->id)}}" class="btn btn-warning">Editar</a></td>
            <td>
                <form action="{{ route('aluno.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Deseja remover o registro?')">
                        Deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>


@stop
