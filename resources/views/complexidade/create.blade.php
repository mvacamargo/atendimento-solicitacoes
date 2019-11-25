@extends('layouts.app')

@section('content')
<div class="row">
    <h1>Nova Complexidade</h1>
</div>
<hr />
<div class="row">
    <form action="/complexidade" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" maxlength="100"
                value="{{old('descricao')}}">
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