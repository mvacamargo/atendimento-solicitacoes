@extends('layouts.app')

@section('content')
<h2>Listagem de Solicitação</h2>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        @foreach($status as $stat)
        <a class="nav-item nav-link" id="nav-{{$stat->id}}-tab" data-toggle="tab" href="#nav-{{$stat->id}}" role="tab"
            aria-controls="nav-{{$stat->id}}" aria-selected="true">{{$stat->descricao}}
            ({{count($solicitacao[$stat->id])}})</a>
        @endforeach
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    @foreach($status as $stat)
    <div class="tab-pane fade show" id="nav-{{$stat->id}}" role="tabpanel" aria-labelledby="nav-{{$stat->id}}-tab">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>E-mail do Solicitante</th>
                        <th>Data da Solicitação</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($solicitacao[$stat->id] as $s)
                    <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->email}}</td>
                        <td>{{$s->data->format('d/m/Y')}}</td>
                        <td>{{$s->descricao}}</td>
                        <td>
                            <a href="{{ url('/solicitacao/'.$s->id.'/edit') }}" class="btn">Visualizar</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="alert alert-danger" colspan="5">Nenhum registro encontrado!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>
@endsection