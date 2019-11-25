@extends('layouts.app')

@section('content')
<div class="row">
    <h2>Listagem de Complexidade - {{count($complexidade)}} registro(s)</h2>
</div>
<div class="row">
    <a href="{{ url('/complexidade/create') }}">Nova Complexidade</a>
</div>
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
            @forelse($complexidade as $c)
            <tr>
                <td class="align-middle">{{$c->id}}</td>
                <td class="align-middle">{{$c->descricao}}</td>
                <td>
                    <a href="{{ url('/complexidade/'.$c->id.'/edit') }}" class="btn btn-block btn-outline-secondary">Editar</a>
                    <form action="/complexidade/{{$c->id}}" method="POST">
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