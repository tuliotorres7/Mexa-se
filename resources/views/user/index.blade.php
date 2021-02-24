@extends('templates.master')
@section('css-view')
@endsection()


@section('js-view')
@endsection()


@section('conteudo-view')
    @if(session('success'))
        <h3>{{    session('success')['messages']        }}</h3>
    @endif
    {!! Form::open(['route' => 'user.store', 'method' => 'post','class'=>  'form-padrao'])!!}
        @include('templates.formulario.input',['input' => 'cpf', 'attributes'=>['placeholder' => 'CPF']])
        @include('templates.formulario.input',['input' => 'nome', 'attributes'=>['placeholder' => 'Nome']])
        @include('templates.formulario.input',['input' => 'instrutor', 'attributes'=>['placeholder' => 'Instrutor']])
        @include('templates.formulario.input',['input' => 'email', 'attributes'=>['placeholder' => 'E-mail']])
        @include('templates.formulario.password',['input' => 'password', 'attributes'=>['placeholder' => 'Senha']])
        @include('templates.formulario.submit',['input' => 'Cadastrar'])
    {!! Form::close()!!}

    <table class="default-table">
        <thead>
            <tr>
                <td> id </td>
                <td> CPF </td>
                <td> Nome </td>
                <td> Email </td>
                <td> Instrutor </td>
                <td> Status </td>
                <td> Permissão </td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user -> id}}</id>
                <td>{{$user -> cpf}}</td>
                <td>{{$user -> nome}}</td>
                <td>{{$user -> email}}</td>
                <td>{{$user -> instrutor}}</td>
                <td>{{$user -> status}}</td>
                <td>{{$user -> permission}}</td>
                <td>
                    {!!Form::open(['route'=> ['user.destroy',$user->id],'method' => 'DELETE'])!!}
                    {!!Form::submit('Remover')!!}
                    {!!Form::close()!!}

                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection()