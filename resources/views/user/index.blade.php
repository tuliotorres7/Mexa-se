@extends('templates.master')
@section('css-view')
@endsection()


@section('js-view')
@endsection()


@section('conteudo-view')
    @if(session('success'))
        <h3>
        {{    session('success')['messages']        }}</h3>
    {!! Form::open(['route' => 'user.store', 'method' => 'post','class'=>  'form-padrao'])!!}
        @include('templates.formulario.input',['input' => 'cpf', 'attributes'=>['placeholder' => 'CPF']])
        @include('templates.formulario.input',['input' => 'nome', 'attributes'=>['placeholder' => 'Nome']])
        @include('templates.formulario.input',['input' => 'instrutor', 'attributes'=>['placeholder' => 'Instrutor']])
        @include('templates.formulario.input',['input' => 'email', 'attributes'=>['placeholder' => 'E-mail']])
        @include('templates.formulario.password',['input' => 'password', 'attributes'=>['placeholder' => 'Senha']])
        @include('templates.formulario.submit',['input' => 'Cadastrar'])
    {!! Form::close()!!}

    <table class="default-table" >
        <thead>
            <td> CPF </td>
            <td> Nome </td>
            <td> Email </td>
            <td> Status </td>
            <td> Permissão </td>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
    </table>
@endsection()