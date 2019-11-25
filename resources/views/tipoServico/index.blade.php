@extends('layouts.app')

@section('content')
<h2>Listagem de Tipo de Serviço - {{count($tipoServico)}} registro(s)</h2>
<a href="{{ url('/tipoServico/create') }}">Novo Tipo de Serviço</a>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tipoServico as $ts)
            <tr>
                <td>{{$ts->id}}</td>
                <td>{{$ts->descricao}}</td>
                <td>
                    <a href="{{ url('/tipoServico/'.$ts->id.'/edit') }}" class="btn">Editar</a>
                    <form action="/tipoServico/{{$ts->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td class="alert alert-danger" colspan="3">Nenhum registro encontrado!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection