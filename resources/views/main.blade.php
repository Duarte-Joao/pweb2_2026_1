<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo1') - SIG ACAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>

  <!-- header> -->
  <header>

</header>
<!-- principal-->
<main >
    <div class="container mt-4">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alert-dimissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="fechar"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dimissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="fechar"></button>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        @if($errors->any())
            <div class="alert alert-success alert-dimissible fade show" role="alert">
                <b>Por favor, verifique os erros abaixo</b>
                    <ul class="mb-0 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
        @endif
        @yield('conteudo')
    </div>
</main>



<!-- footer-->
<footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>

