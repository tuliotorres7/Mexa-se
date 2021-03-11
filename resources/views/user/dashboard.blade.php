@extends('templates.masterCam')
@section('css-view')
@endsection()


@section('js-view')

<script>
    function createQrCode()
    {
        
        var userInput = document.getElementById('valor').value;

        var qrcode = new QRCode("qrcode", {
            text: userInput,
            width: 256,
            height: 256,
            colorDark: "black",
            colorLight: "white",
            correctLevel : QRCode.CorrectLevel.H
        });
    }
    </script>
@endsection()


@section('conteudo-view')

    <input type="text" id="valor" value="">
    <button onClick="createQrCode()">Gerar QR Code</button>
    <div id="qrcode"></div>


    
@endsection()