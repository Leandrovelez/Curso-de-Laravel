@extends('admin.layouts.app')

@section('title', 'Cadastrar novo produto')

@section('content')
    <h1>Cadastrar novo produto</h1>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif

    <form action="{{ route('products.store') }}" method='post' enctype="multipart/form-data">
        @csrf <!-- cria um token de validação -->
        <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}"> <!-- funcionalidade flash, preserva o valor do campo uma vez -->
        <input type="text" name="description" placeholder="Descrição" value="{{ old('description') }}">
        <input type="file" name="photo" id="">
        <button type="submit">Salvar</button>
    </form>
@endsection