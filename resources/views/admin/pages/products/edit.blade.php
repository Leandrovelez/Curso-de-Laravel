@extends('admin.layouts.app')

@section('title', 'Editar produto')

@section('content')
    <h1>Editar produto {{ $id }}</h1>

    <form action="{{ route('products.update', $id) }}" method='post'>
        @csrf <!-- cria um token de validação -->
        @method('PUT') <!-- era diretiva define o metodo como put, porque o update não aceita post ou get -->
        <input type="text" name="name" placeholder="Nome">
        <input type="text" name="description" placeholder="Descrição">
        <button type="submit">Salvar</button>
    </form>
@endsection