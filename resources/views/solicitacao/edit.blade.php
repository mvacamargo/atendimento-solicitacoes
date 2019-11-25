@extends('layouts.app')

@section('content')
<div class="row">
    <h1>Visualizar Solicitação - {{$solicitacao->id}}</h1>
</div>
<hr />
<div class="row">
    <form action="/solicitacao/{{$solicitacao->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="email">E-mail do Solicitante</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$solicitacao->email}}" disabled>
        </div>
        <div class="form-group">
            <label for="data">Data da Solicitação</label>
            <input type="text" class="form-control" id="data" name="data"
                value="{{$solicitacao->data->format('d/m/Y')}}" disabled>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao"
                disabled>{{$solicitacao->descricao}}</textarea>
        </div>
        <div class="form-group">
            <label for="tempoGasto">Tempo Gasto</label>
            <input type="text" class="form-control" id="tempoGasto" name="tempoGasto" maxlength="3"
                value="{{$solicitacao->tempoGasto}}">
            @if($errors)
            <div class="text-danger">
                {{$errors->first('tempoGasto')}}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="unidadeTempo_id">Unidade de Tempo</label>
            <select class="form-control" id="unidadeTempo_id" name="unidadeTempo_id">
                @foreach($unidadeTempo as $ut)
                <option value="{{$ut->id}}" {{$ut->id == $solicitacao->unidadeTempo_id ? 'selected' : ''}}>
                    {{$ut->descricao}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipoServico_id">Tipo de Serviço</label>
            <select class="form-control" id="tipoServico_id" name="tipoServico_id">
                @foreach($tipoServico as $ts)
                <option value="{{$ts->id}}" {{$ts->id == $solicitacao->tipoServico_id ? 'selected' : ''}}>
                    {{$ts->descricao}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="complexidade_id">Complexidade</label>
            <select class="form-control" id="complexidade_id" name="complexidade_id">
                @foreach($complexidade as $c)
                <option value="{{$c->id}}" {{$c->id == $solicitacao->complexidade_id ? 'selected' : ''}}>
                    {{$c->descricao}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ocorrencias">Ocorrências</label>
            <textarea class="form-control" id="ocorrencias" name="ocorrencias">{{$solicitacao->ocorrencias}}</textarea>
        </div>
        <div class="form-group">
            <label for="status_id">Status</label>
            <select class="form-control" id="status_id" name="status_id">
                @foreach($status as $s)
                <option value="{{$s->id}}" {{$s->id == $solicitacao->status_id ? 'selected' : ''}}>{{$s->descricao}}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ url('/solicitacao') }}" class="btn">Cancelar</a>
    </form>
</div>
@endsection