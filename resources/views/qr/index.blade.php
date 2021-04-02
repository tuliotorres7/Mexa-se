@extends('templates.masterAdmin')
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
        <span id="geraQr"> ID-Cliente:</span> 

    <div class="input-group mb-3">
        <input type="text" id="valor" class="form-control" placeholder="ID-Cliente" aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

    <button type="button" class="btn btn-warning" onClick="createQrCode()" >Gerar QR Code</button>

    <button type="button" class="btn btn-outline-secondary" onClick="window.location.reload()">Limpar QR</button>
    </div>
    </div>
    <div id="qrcode"></div>
@endsection()