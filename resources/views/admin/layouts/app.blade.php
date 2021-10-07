<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('styles')
</head>
<body>
    @yield('content') <!-- o @ indica uma diretiva, aqui vai exibir a sessão chamada 'content' -->

    @stack('scripts')
</body>
</html>