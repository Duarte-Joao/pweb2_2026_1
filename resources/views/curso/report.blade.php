<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>{{$titulo}}</h3>

    <img src="{{ storage_path('app/public/sem_imagem.jpg') }}" style="width: 200px; height: 200px">

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
            @foreach ($cursos as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->requisito }}</td>
                    <td>{{ $item->carga_horaria }}</td>
                    <td>{{ $item->valor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
