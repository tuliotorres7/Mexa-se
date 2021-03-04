@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
@endif
<form  method="POST" action="{{route('relatorioPresenca.search')}}" class="form-padrao">
{!!csrf_field()!!}
<label class>
<span>Relatorio Presenca</span>
    <input type="date" name="data">
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
        <th>Status</th>
    </tr>

</thead>
    
</thead>
    <tbody>
        @if($presencas)
        @foreach($presencas as $prc)
        <tr>
            <td>{{ $prc->id}}</td>
            <td>{{ $prc->cliente->nome}}</td>
            <td>{{ $prc->instrutor->nome}}</td>

            <td>{{ $prc->abertura}}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
    </table>
    </table>

@endsection