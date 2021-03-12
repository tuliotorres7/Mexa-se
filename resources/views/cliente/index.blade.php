@extends('templates.masterAdmin')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'cliente.store', 'method' => 'post','class'=>  'form-padrao'])!!}
<div class="row">        
<div class="col">
        @include('templates.formulario.input',['input' => 'nome', 'attributes'=>['placeholder' => 'Nome']])
        </div>  
<div class="col">

        @include('templates.formulario.select',['label' => 'Instrutor', 'select' =>'user_id', 'data'=> $user_list ?? '' , 'attributes'=>['placeholder' => 'Instrutor']])
        </div>
        </div>
        <div class="row">        
<div class="col">
        @include('templates.formulario.input',['input' => 'telefone', 'attributes'=>['placeholder' => 'Telefone']])
        </div>  
<div class="col">
@include('templates.formulario.input',['input' => 'endereco', 'attributes'=>['placeholder' => 'Endereco']])
        </div>
        </div>
        <div class="row">        
<div class="col">
<label class>
<span>Dia de Inicio</span>
    <input type="date" name="dataInicio">
</label>
        </div>  
        <div class="col">
        @include('templates.formulario.input',['input'=>'obs','label' => 'Observação', 'attributes'=>['placeholder' => 'Observações']])
        </div>
        </div>
        <div class="row">        
        <div class="col">
        @include('templates.formulario.submit',['input' => 'Cadastrar'])
        </div>
        </div>
        
       
        
{{--<div class="col">@include('templates.formulario.input',['input' => 'Dias de Aula', 'attributes'=>['placeholder' => 'Dias da Aula']]) </div>--}}{{-- <div class="row">        <div class="col">        @include('templates.formulario.input',['input' => 'Horario', 'attributes'=>['placeholder' => 'Horario']]) </div>--}}

        {!! Form::close()!!}


<div class="row">
<div class=table-responsive-xl>
<table class="table table-hover">
<thead>
    <tr>
        <th>#</th>
        <th>Nome do Cliente</th>
        <th>Instrutor</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Data de Inicio</th>
        <th>Observações</th>
        <th>Opções</th>
    </tr>
</thead>
    <tbody>
        @foreach( $clientes as $clt)
        <tr>
            <td>{{ $clt-> id}}</td>
            <td>{{ $clt-> nome}}</td>
            <td>{{ $clt-> instrutor->nome}}</td>
            <td>{{ $clt-> telefone}}</td>
            <td>{{ $clt-> endereco}}</td>
            <td>{{ $clt-> dataInicio}}</td>
            <td>{{ $clt-> obs}}</td>
            <td>
                {!! Form::open(['route'=> ['cliente.destroy',$clt->id], 'method'=>'delete']) !!}
                {!! Form::submit("Remover")!!}
                {!! Form::close()!!}           
            </td>
        </tr>
            @endforeach
    </tbody>
    </table>
</div>
</div>
@endsection