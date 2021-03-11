<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Mexa-se</title>
        <!--@yield('css-view')-->
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d80969b397.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>
        <script type="text/javascript" src="qrcode.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body>
      @include('templates.menu-lateral')
        <section id="view-conteudo">
            @yield('conteudo-view')
            <video id="preview"></video>
    <script>
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            alert('Escaneou o conteudo: ' + content);
            window.open(content, "_blank");
        });
        
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("Não existe câmera no dispositivo!");
            }
        });
    </script>
    
        </section>
        @yield('js-view')
        </body>
    
</html>
