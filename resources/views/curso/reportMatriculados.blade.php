<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>{{ $titulo }}</h3>

    <img src="{{ storage_path('app/public/sem_imagem.jpg') }}" style="width: 200px; height: 200px">

    @foreach ($cursos as $curso)
        <h4>{{ $curso->nome }}</h4>

        @if ($curso->alunos->isEmpty())
            <p>Nenhum aluno matriculado no curso</p>
        @else
            <p>Total de Alunos Matriculados Neste curso: {{ $curso->alunos->count() }}</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Data Matricula</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($curso->alunos as $aluno)
                    @php
                        $dataMatricula = date('d/m/Y', strtotime($aluno->pivot->data_matricula));
                    @endphp
                        <tr>
                            <th scope="row">{{ $aluno->id }}</th>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->cpf }}</td>
                            <td>{{ $aluno->telefone }}</td>
                            <td>{{ $aluno->categoria->nome ?? ' - ' }}</td>
                            <td>{{ $dataMatricula ?? ' - ' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</body>

</html>
