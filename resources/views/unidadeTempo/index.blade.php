@extends('layouts.app')

@section('content')
<h2>Listagem de Unidade de Tempo - {{count($unidadeTempo)}} registro(s)</h2>
<a href="{{ url('/unidadeTempo/create') }}">Nova Unidade de Tempo</a>
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
            @forelse($unidadeTempo as $ut)
            <tr>
                <td>{{$ut->id}}</td>
                <td>{{$ut->descricao}}</td>
                <td>
                    <a href="{{ url('/unidadeTempo/'.$ut->id.'/edit') }}" class="btn">Editar</a>
                    <form action="/unidadeTempo/{{$ut->id}}" method="POST">
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