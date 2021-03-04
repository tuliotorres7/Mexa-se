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
        <th>Opções</th>
    </tr>

</thead>
    <tbody>
        <tr>
            <td>
                     
            </td>
        </tr>
    </tbody>
    </table>

@endsection