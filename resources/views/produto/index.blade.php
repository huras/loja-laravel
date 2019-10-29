@extends('layouts.themed')
@section('title', 'Produtos - Listagem')

@section('content')



<div class='container'>

    @if(session('message'))
        <div id='mensagem' class="btn {{session('messageType')}}"> {{session('message')}} <span onClick="document.getElementById('mensagem').style.visibility = 'hidden';" > X </span> </div>
    @endif

    <h1>
        Produtos
    </h1>
    <div class='row'>
        <a href="/produtos/add" class="btn btn-success">Novo Produto</a>
    </div>
    <div class='row'>
        @foreach($produtos as $produto)
        <div class="card" style="width: 18rem;">
            <img src="/storage/files/produtos/{{$produto->cover}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$produto->nome}}</h5>
                <p class="card-text">{{$produto->descricao}}</p>
                <p class="card-text">{{$produto->preco}}</p>
                <a href="/produtos/edit/{{$produto->id}}" class="btn btn-primary">Editar</a>
                <a href="/produtos/delete/{{$produto->id}}" class="btn btn-danger">Remover</a>
            </div>
        </div>

                    <!-- {{$produto->estoque}}
                    {{$produto->peso_gramas}}
                    {{$produto->created_at}}
                    {{$produto->updated_at}} -->


        @endforeach
        <a href="/produtos/add" class="btn btn-success">+</a>
    </div>
<div>

@endsection
