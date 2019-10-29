@extends('layouts.themed')
@section('title', 'Produtos - Editar')

@section('content')
<div class='container'>
    <div class='row d-flex'>
        <div class='col-9'>
            <form action="/produtos/update/{{$produto->id}}" method='POST' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class='form-group'>
                    <label> Cover </label>
                    <input class="form-control" type="file" name='cover' value='{{old("cover")}}'>
                </div>
                @if($errors->has('cover'))
                    <div class="btn btn-danger"> {{$errors->first('cover')}} </div>
                @endif

                <div class='form-group'>
                    <label> Nome </label>
                    <input class="form-control" type="text" name='nome' value="{{old('nome', $produto->nome)}}">
                </div>
                @if($errors->has('nome'))
                    <div class="btn btn-danger"> {{$errors->first('nome')}} </div>
                @endif

                <div class='form-group'>
                    <label> Descrição </label>
                    <textarea class="form-control" name="descricao" cols="30" rows="5">{{old('descricao', $produto->descricao)}}</textarea>
                </div>
                @if($errors->has('descricao'))
                    <div class="btn btn-danger"> {{$errors->first('descricao')}} </div>
                @endif

                <div class='form-group'>
                    <label> Preço </label>
                    <input class="form-control" type="text" name='preco' value="{{old('preco', $produto->preco)}}">
                </div>
                @if($errors->has('preco'))
                    <div class="btn btn-danger"> {{$errors->first('preco')}} </div>
                @endif

                <div class='form-group'>
                    <label> Peso </label>
                    <input class="form-control" type="number" name='peso_gramas' value="{{old('peso_gramas', $produto->peso_gramas)}}">
                </div>
                @if($errors->has('peso_gramas'))
                    <div class="btn btn-danger"> {{$errors->first('peso_gramas')}} </div>
                @endif

                <div class='form-group'>
                    <label> Estoque </label>
                    <input class="form-control" type="number" name='estoque' value="{{old('estoque', $produto->estoque)}}">
                </div>
                @if($errors->has('estoque'))
                    <div class="btn btn-danger"> {{$errors->first('estoque')}} </div>
                @endif

                <input type="submit" value='Salvar' class="btn btn-primary btn-lg btn-block">
                <a href='/produtos' class="btn btn-secondary btn-lg btn-block">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
