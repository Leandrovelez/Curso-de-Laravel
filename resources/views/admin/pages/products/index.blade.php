@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    </h1>Exibindo os produtos com Template</h1>
    {{ $teste }}
    <br>
    <a href="{{ route('products.create') }}" title="cadastrar">Cadastrar</a>

    @component('admin.components.card')
    
        @slot('titulo')
            <h1>Título do card</h1>
        @endslot
    Um card de exemplo

    @endcomponent


    <hr>

    @include('admin/includes.alerts') <!-- inclui os alertas -->

    <hr>

    @if(isset($products))
        <p>{{$products[1]}}</p>

        @foreach ($products as $product)
            <p>{{$product}}</p>
        @endforeach
    @endif

    <hr>

   {{$testeVariavel}}


   <hr>

    <!-- {{ $testeVariavel }} -->

    
    @if($testeVariavel === 123)
        É igual
    @else
        É diferente
    @endif

    @unless($testeVariavel === '123')<!-- é o contrário do if, só entra se for falso -->
        É diferente (unlesss)
    @endunless

    @isset($teste2) <!-- o isset verifica se uma variavel existe -->
        <p>{{$teste2}}</p>
    @endisset

    @empty($teste3) <!-- Verifica se está vazio -->
        <p>Vazio...</p>
    @endempty

    @auth <!-- Verifica se está autenticado -->
        <p>Autenticado</p>
    @else
        <p>Não autenticado</p>
    @endauth

    @guest <!-- Verifica se não está autenticado -->
        <p>Convidado</p>
    @endguest

    @switch($teste4)
        @case('verde')
            <p>A cor é verde</p>
            @break
        @case('vermelho')
            <p>A cor é vermelho</p>
            @break
        @default

    @endswitch

@endsection

@push('styles')
    <style>
        .last {background: gray; }
    </style>

@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef'
    </script>
@endpush
