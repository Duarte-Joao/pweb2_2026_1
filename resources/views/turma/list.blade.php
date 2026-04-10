@extends('main')
@section('titulo', 'Listagem de turmas')
@section('conteudo')

    <h4>Listagem de Turma - Curso: {{ $curso->nome }}</h4>
    <div class="row">
        <div class="col">
            <form action="{{ route('turma.search') }}" method="post">
                @csrf
                <div class="row">
                    <input type="hidden" name="curso" value="{{ $curso }}">
                    <div class="col-md-2">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="codigo">Código</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="Pesquisar...">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary"> Buscar</button>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('curso.turmas.create', $curso->id) }}" class="btn btn-success"> Novo</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('curso.index') }}" class="btn btn-secondary">
                            Voltar</a>
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
                        <th scope="col">Código</th>
                        <th scope="col">Data Início</th>
                        <th scope="col">Data Fim</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->codigo }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->data_inicio)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->data_fim)) }}</td>
                            <td>
                                <a href="{{ route('turma.edit', [$curso->id, $item->id]) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('turma.destroy', [$curso->id, $item->id]) }}" method="post">
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
