<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Home | Mexa-se</title>
        @yield('css-view')
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d80969b397.js" crossorigin="anonymous"></script>
        
    </head>

    <body>
        @include('templates.menu-lateral')

        <section id="view-conteudo">
            @yield('conteudo-view')
        </section>
        @yield('js-view')
        </body>
</html>
