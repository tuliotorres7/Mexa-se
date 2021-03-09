@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'presenca.store', 'method' => 'post','class'=>  'form-padrao'])!!}
<div class="row">        
<div class="col">
        @include('templates.formulario.input',['input' => 'cliente_id', 'attributes'=>['placeholder' => 'ClienteID']])
        </div>
        <div class="col">
        @include('templates.formulario.checkbox', ['label' => 'Radio'])
        </div>
        </div>
        
        @include('templates.formulario.submit',['input' => 'Assinar presença'])
{!! Form::close()!!}


@endsection