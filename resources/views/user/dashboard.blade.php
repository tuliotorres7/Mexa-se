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

    <div class="row">
    <div class="col">
    <label class="form-padrao">
        <span id="geraQr"> ID-Cliente:</span> 
    <input type="text" id="valor" value="">
    </label>
    <button onClick="createQrCode()">Gerar QR Code</button>
    
    </div>
    </div>
    <div id="qrcode"></div>


    
@endsection()