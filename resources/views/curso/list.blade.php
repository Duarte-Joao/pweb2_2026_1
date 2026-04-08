@extends('main')
@section('titulo', 'Listagem de Cursos')
@section('conteudo')

    <h4>Listagem de Cursos</h4>

    <div class="row">
        <div class="col">
            <form action="{{ route('curso.search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label"></label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="requisito">Requisito</option>
                            <option value="carga_horario">Carga Horaria</option>
                            <option value="valor">Valor</option>
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
                        <a href="{{ url('curso/create') }}" class='btn btn-success'>Novo</a>
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
                <th scope="col">Requisito</th>
                <th scope="col">Carga Horária</th>
                <th scope="col">Valor</th>
                <th scope="col">Detalhe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    </td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->requisito }}</td>
                    <td>{{ $item->carga_horaria }}</td>
                    <td>{{ $item->valor }}</td>
                    <td>{{ $item->valor }}</td>
                    <td><a href="{{ route('curso.turmas', $item->id) }}" class="btn btn-primary">Ver Turmas</a></td>
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


@stop
