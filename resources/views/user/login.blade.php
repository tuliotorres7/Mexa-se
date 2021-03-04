<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Login | Mexa-se </title>
        <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    </head>
    <body>

        <div class="background"></div>

        <section id="conteudo-view" class="login">
            <h1> Mexa-se</h1>
            <h3> Esporte do seu Jeito !!!</h3>

            {!! Form::open(['route' => 'user.login','method'=>'post'])  !!}
            
            <p>Acesse o sistema</p>
            <label>
            {!! Form::text('username', NULL,['class'=> 'input','placeholder' => "Usuario"])!!}
            </label>

            <label>
            {!! Form::password('password', ['placeholder' => 'Senha'])!!}
            </label>
            
            {!! Form::submit('Entrar') !!}
            
            {!! Form::close() !!}
            
            <form class="" action="index.html" method="post">
            </form>
        </section>
    </body>
</html>





