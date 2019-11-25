@extends('layouts.app')

@section('content')
<div class="row">
    <h2>Listagem de Status / <span class="badge badge-secondary">{{count($status)}}</span> registro(s)</h2>
</div>
<div class="table-responsive">
    <table class="table table-dark table-bordered table-striped">
        <thead>
            <tr>
                <th class="col-md-2">#</th>
                <th class="col-md-10">Descrição</th>
            </tr>
        </thead>
        <tbody>
            @forelse($status as $s)
            <tr>
                <td class="align-middle">{{$s->id}}</td>
                <td class="align-middle">{{$s->descricao}}</td>
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