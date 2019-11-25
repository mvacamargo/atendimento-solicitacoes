@extends('layouts.app')

@section('content')
<h2>Listagem de Unidade de Tempo - {{count($unidadeTempo)}} registro(s)</h2>
<a href="{{ url('/unidadeTempo/create') }}">Nova Unidade de Tempo</a>
<div class="table-responsive">
    <table class="table table-dark table-bordered table-striped">
        <thead>
            <tr>
                <th class="col-md-2">#</th>
                <th class="col-md-6">Descrição</th>
                <th class="col-md-4">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($unidadeTempo as $ut)
            <tr>
                <td class="align-middle">{{$ut->id}}</td>
                <td class="align-middle">{{$ut->descricao}}</td>
                <td>
                    <a href="{{ url('/unidadeTempo/'.$ut->id.'/edit') }}"
                        class="btn btn-block btn-outline-secondary">Editar</a>
                    <form action="/unidadeTempo/{{$ut->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-block btn-outline-danger">Excluir</button>
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