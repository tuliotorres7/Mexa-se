<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Login | Mexa-se </title>
        <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <section id="conteudo-view" class="container-fluid">
        
    {!! Form::open(['route' => 'user.login','method'=>'post'])  !!}
            
        <div class="row " >
        <div class="col"></div>
                <div class="col">
            
            <h1> Mexa-se</h1>
            <h3> Esporte do seu Jeito !!!</h3>

            <p>Acesse o sistema</p>
        </div>
        <div class="col"></div>
        </div>
        <div class="row">
            
        <div class="col"></div>

        <div class="col">
            <label class="">
            <input placeholder="Nome" name="username" type="text">                  
            </label>
        </div>

        <div class="col"></div>
        </div>
<div class="row">

<div class="col"></div>

<div class="col">
            <label class="">
            {!! Form::password('password', ['placeholder' => 'Senha'])!!}
</label>
</div>
<div class="col"></div>
        </div>
<div class="row">

<div class="col"></div>
        <div class="col">
            {!! Form::submit('Entrar') !!}
        </div>

<div class="col"></div>
</div>       

            {!! Form::close() !!}
            
            <form class="" action="index.html" method="post">
            </form>
        </section>
    </body>
</html>





