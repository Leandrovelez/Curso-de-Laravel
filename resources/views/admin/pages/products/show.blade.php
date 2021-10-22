@extends('admin.layouts.app')

@section('title', 'Detalhes do produto {{ $product->name }}')

@section('content')

<h1>Produto {{ $product[0]->name }} <a href="{{ route('products.index') }}"><<</a> </h1>

<ul class="list-group">
    <li class="list-group-item"><strong>Nome: </strong>{{ $product[0]->name }}</li>
    <li class="list-group-item"><strong>Preço: </strong>{{ $product[0]->price }}</li>
    <li class="list-group-item"><strong>Descrição: </strong>{{ $product[0]->description }}</li>
</ul>

<form action="{{ route('products.destroy', $product[0]->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar o produto: {{ $product[0]->name }}</button>
</form>

@endsection