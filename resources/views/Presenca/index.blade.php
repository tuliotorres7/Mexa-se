@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'presenca.store', 'method' => 'post','class'=>  'form-padrao'])!!}
<div class="row">        
<div class="col">
<label class="">
    <span>cliente_id</span>
    <input type="text" id="cliente_id" placeholder="ClienteID"/>
</label>
        </div>
        <div class="col">
        @include('templates.formulario.checkbox', ['label' => 'Radio'])
        </div>
        </div>
        
        @include('templates.formulario.submit',['input' => 'Assinar presença'])

<video id="preview"></video>
    <script>
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            alert('Escaneou o conteudo: ' + content);
                            
        });
        document.write(con);
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("Não existe câmera no dispositivo!");
            }
        });
    </script>
{!! Form::close()!!}

@endsection