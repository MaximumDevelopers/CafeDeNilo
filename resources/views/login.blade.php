<!-- Default form login -->
    
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

    <Title>{{config('app.name', 'Cafe de\' Nilo')}}</Title>
    </head>
    <body class="grey lighten-3 fixed-sn">

        <header>
            
        </header>
                <!-- Default form login col-md-4 col-md-offset-4 -->
                <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
             <script type="text/javascript" src="{{ asset('js/addons/datatables.js') }}"></script>
        <form class="card border border-light p-5 col-lg-6 offset-lg-3 mt-10 ">
            <div class="text-center">

            <p class="h4 mb-4">Sign in</p>

            <!-- Email -->
            <input type="email" id="materialLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

            <!-- Password -->
            <div class="md-form ml-0 mr-0">
                    <input type="password" type="text" id="form1" class="form-control ml-0">
                    <label for="form1" class="ml-0">Enter password</label>
                </div>

            <div class="d-flex justify-content-around">
                <div>
                    <!-- Remember me -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                    </div>
                </div>
                <div>
                    <!-- Forgot password -->
                    <a href="">Forgot password?</a>
                </div>
            </div>

            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4 " type="submit">Sign in</button>
            </div>
        </form>
    
    </body>
</html>