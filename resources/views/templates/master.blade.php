<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Home | Mexa-se</title>
        <!--@yield('css-view')-->
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d80969b397.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
      @include('templates.menu-lateral')
        <section id="view-conteudo">
            @yield('conteudo-view')
        </section>
        @yield('js-view')

        </body>
</html>
