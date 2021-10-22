@extends('admin.layouts.app')

@section('title', 'Cadastrar novo produto')

@section('content')
    <h1>Cadastrar novo produto  <a href="{{ route('products.index') }}"><<</a> </h1>
    @include('admin.includes.alerts')
  

    <form action="{{ route('products.store') }}" method='post' enctype="multipart/form-data" class="form">
        @csrf <!-- cria um token de validação -->
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ old('name') }}"> <!-- funcionalidade flash, preserva o valor do campo uma vez -->
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="price" placeholder="Preço" value="{{ old('price') }}">  
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="description" placeholder="Descrição" value="{{ old('description') }}">  
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="image" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection