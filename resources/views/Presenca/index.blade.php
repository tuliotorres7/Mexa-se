@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'presenca.store', 'method' => 'post','class'=>  'form-padrao'])!!}
        @include('templates.formulario.input',['input' => 'cliente_id', 'attributes'=>['placeholder' => 'ClienteID']])
        @include('templates.formulario.checkbox', ['label' => 'Radio'])
        
        @include('templates.formulario.submit',['input' => 'Assinar presença'])
{!! Form::close()!!}


@endsection