@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos</h1>
    <br>
    <a href="{{ route('products.create') }}" title="cadastrar" class="btn btn-primary">Cadastrar</a>
    <br>
    <hr>
    
    <table class="table table-sm table-dark">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td> {{ $product->name }} </td>
                <td> {{ $product->price }} </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                    <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    

    <hr>

    <br>
    
    {!! $products->links() !!}

@endsection

@push('styles')
    <style>
        .last {background: gray; }
    </style>

@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef';
        document.body.style.paddingLeft = 50px
    </script>
@endpush
