@extends('templates.master')
@section('css-view')
@endsection()


@section('js-view')
@endsection()


@section('conteudo-view')
    @if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif
 
    {!! Form::open(['route' => 'user.store', 'method' => 'post','class'=>  'form-padrao'])!!}
    <div class="row">        
<div class="col">
    @include('templates.formulario.input',['input' => 'cpf', 'attributes'=>['placeholder' => 'CPF']])
</div>
<div class="col">
    @include('templates.formulario.input',['input' => 'nome', 'attributes'=>['placeholder' => 'Nome']])
</div>
</row>
<div class="row">  
    <div class="col">
    @include('templates.formulario.input',['input' => 'email', 'attributes'=>['placeholder' => 'E-mail']])
</div>
<div class="col">
        @include('templates.formulario.password',['input' => 'password', 'attributes'=>['placeholder' => 'Senha']])
</div></div>
        <div class="row">        
        @include('templates.formulario.submit',['input' => 'Cadastrar'])
</div>
        {!! Form::close()!!}

    <table class="table table-hover">
        <thead>
            <tr>
                <td> id </td>
                <td> CPF </td>
                <td> Nome </td>
                <td> Email </td>
                <td> Status </td>
                <td> Permissão </td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user -> id}}</id>
                <td>{{$user -> formattedCpf}}</td>
                <td>{{$user -> nome}}</td>
                <td>{{$user -> email}}</td>
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