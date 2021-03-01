@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif


<form action="{{route('relatorio.search')}}" method="POST" class="form-padrao">
{!!csrf_field()!!}
    <select name="type">
    <option value="">Instrutor</option>
    @foreach( $user_list as $key => $ul)
    <option value="{{$key}}">{{$ul}}</option>
    @endforeach
    </select>
<button type="submit" class="btn-primary">Pesquisar</button>
</form>


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
        @foreach($clientes as $clt)
        <tr>
            <td>{{ $clt->id}}</td>
            <td>{{ $clt->nome}}</td>
            <td>{{ $clt->instrutor->nome}}</td>
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