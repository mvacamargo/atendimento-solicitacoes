@extends('layouts.app')

@section('content')
<div class="row">
    <h1>Editar Unidade de Tempo - {{$unidadeTempo->descricao}}</h1>
</div>
<hr />
<div class="row">
    <form action="/unidadeTempo/{{$unidadeTempo->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" maxlength="100"
                value="{{$unidadeTempo->descricao}}">
            @if($errors)
            <div class="text-danger">
                {{$errors->first('descricao')}}
            </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection