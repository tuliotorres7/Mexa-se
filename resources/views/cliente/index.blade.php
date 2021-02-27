@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'cliente.store', 'method' => 'post','class'=>  'form-padrao'])!!}
        @include('templates.formulario.input',['input' => 'nome', 'attributes'=>['placeholder' => 'Nome']])
        @include('templates.formulario.select',['label' => 'Instrutor', 'select' =>'user_id', 'data'=> $user_list ?? '' , 'attributes'=>['placeholder' => 'Instrutor']])
        @include('templates.formulario.submit',['input' => 'Cadastrar'])
    {!! Form::close()!!}



<table class="default-table">
<thead>
    <tr>
        <th>#</th>
        <th>Nome do Cliente</th>
        <th>Instrutor</th>
        <th>Opções</th>
    </tr>

</thead>
    <tbody>
        @foreach( $clientes as $clt)
        <tr>
            <td>{{ $clt-> id}}</td>
            <td>{{ $clt-> nome}}</td>
            <td>{{ $clt-> instrutor->nome}}</td>
            <td>
                {!! Form::open(['route'=> ['cliente.destroy',$clt->id], 'method'=>'delete']) !!}
                {!! Form::submit("Remover")!!}
                {!! Form::close()!!}           
            </td>
        </tr>
            @endforeach
    </tbody>
    </table>
@endsection