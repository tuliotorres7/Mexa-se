@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif


<form  method="POST" action="{{route('relatorio.search')}}" class="form-padrao">
{!!csrf_field()!!}
<label class>
<span>Instrutor</span>
    <select name="user_id">
    <option value="">Instrutor</option>
    @foreach( $user_list as $key => $ul)
    <option value="{{$key}}">{{$ul}}</option>
    @endforeach
    </select>
</label>
<label class="submit">
    <input type="submit" value="Pesquisar">
</label>
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