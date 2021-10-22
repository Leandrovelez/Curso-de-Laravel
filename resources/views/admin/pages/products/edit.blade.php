@extends('admin.layouts.app')

@section('title', 'Editar produto {{ $product->name }}')

@section('content')
    <h1>Editar produto {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method='post'>
        @csrf <!-- cria um token de validação -->
        @method('PUT') <!-- era diretiva define o metodo como put, porque o update não aceita post ou get -->
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ $product->name }}"> <!-- funcionalidade flash, preserva o valor do campo uma vez -->
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="price" placeholder="Preço" value="{{ $product->price }}">  
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="description" placeholder="Descrição" value="{{ $product->description }}">  
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection