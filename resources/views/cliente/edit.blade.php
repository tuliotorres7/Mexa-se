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
        <tr>
            <td>{{ $clientes-> nome}}</td>
            <td>{{ $clientes-> instrutor->nome}}</td>
            <td>{{ $clientes-> telefone}}</td>
            <td>{{ $clientes-> endereco}}</td>
            <td>{{ $clientes-> dataInicio}}</td>
            <td>{{ $clientes-> obs}}</td>       
        </tr>
        <td>
                {!! Form::model($user['route'=> ['cliente.destroy',$clt->id], 'method'=>'delete']) !!}
                {!! Form::submit("Remover")!!}
                {!! Form::close()!!} 
                <a href="{{route('cliente.edit', $clt->id)}}">Editar</a>          
            </td>
    </tbody>
    </table>
</div>
</div>
@endsection