@extends('layouts.app')

@section('content')
<h2>Listagem de Status - {{count($status)}} registro(s)</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @forelse($status as $s)
            <tr>
                <td>{{$s->id}}</td>
                <td>{{$s->descricao}}</td>
            </tr>
            @empty
            <tr>
                <td class="alert alert-danger" colspan="2">Nenhum registro encontrado!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection