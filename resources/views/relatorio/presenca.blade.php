@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif
<form  method="POST" action="{{route('relatorioPresenca.search')}}" class="form-padrao">
{!!csrf_field()!!}
<div class="row">        
<div class="col">
<label class>
<span>Relatorio Presenca</span>
    <input type="date" name="data" placeholder="Data de inicio">
</label>
</div>
<div class="col">

<label class>
<span>Instrutor</span>
    <select name="user_id">
    <option value="">Instrutor</option>
    @foreach( $user_list as $key => $ul)
    <option value="{{$key}}">{{$ul}}</option>
    @endforeach
    </select>
</label>
</div>
</div>
<div class="row">
<div class="col">

<label class>
<span>Cliente</span>
    <select name="cliente_id">
    <option value="">Cliente</option>
    @foreach( $cliente_list as $key => $ul)
    <option value="{{$key}}">{{$ul}}</option>
    @endforeach
    </select>
</label>
</div>
<div class="col">
<label class="submit">
    <input type="submit" value="Pesquisar">
</label>
</div>
</div>
</form>

<div class="row">
<div class=table-responsive-xl>
<table class="table table-hover">
<thead>
    <tr>
        <th>#</th>
        <th>Nome do Cliente</th>
        <th>Instrutor</th>
        <th>Status</th>
        
    </tr>

</thead>
<tbody>
        @if($presencas)
        
        @foreach($presencas as $prc)
        <tr>
            <td>{{ $prc->id}}</td>
            <td>{{ $prc->cliente->nome}}</td>
            <td>{{ $prc->instrutor->nome}}</td>
            <td>
            @switch($prc->abertura)
    @case(1)
    <span class="abertura-icon"></span>@break
    @case(0)
    <span class="encerramento-icon"></span>@break
@endswitch
    </td>
        </tr>
        @endforeach
        @endif
    </tbody></table>
</div>
</div>
@endsection