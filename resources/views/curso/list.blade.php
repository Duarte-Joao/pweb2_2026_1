@extends('main')
@section('titulo', 'Listagem de curso')
@section('conteudo')

    <h4>Listagem de Curso</h4>

    <div class="row">
        <div class="col">
            <form action="{{ route('curso.search') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-md-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="requisito">Requisito</option>
                            <option value="carga_horaria">Carga Horária</option>
                            <option value="valor">Valor</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="Pesquisar...">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary"> Buscar</button>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ url('curso/create') }}" class="btn btn-success"> Novo</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Requisito</th>
                        <th scope="col">Carga Horiria</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->requisito }}</td>
                            <td>{{ $item->carga_horaria }}</td>
                            <td>{{ $item->valor }}</td>
                            <td><a href="{{ route('curso.turmas', $item->id) }}" class="btn btn-primary">Ver Turma {{$item->turmas->count()}}</a></td>
                            <td><a href="{{ route('curso.edit', $item->id) }}" class="btn btn-warning">Editar</a></td>
                            <td>
                                <form action="{{ route('curso.destroy', $item->id) }}" method="post">
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
        </div>
    </div>

@stop
