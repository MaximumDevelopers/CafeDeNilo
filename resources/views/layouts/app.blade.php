<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <!-- Icons -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <Title>{{config('app.name', 'Cafe de\' Nilo')}}</Title>
    </head>
    <body class="grey lighten-3 fixed-sn">

        <header>
            @include('inc.navbar')
            @include('inc.sidebar')
        </header>
        <main class="pt-5 mx-lg-5">
            <div class="container-fluid mt-5">
             <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
             <script type="text/javascript" src="{{ asset('js/addons/datatables.js') }}"></script>
                @yield('content')
               
            </div>
        </main>
    
    </body>
</html>
