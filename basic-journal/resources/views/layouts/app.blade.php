<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Journal</title>

    <!-- Bootstrap Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Bootstrap Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- custom Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>

    @include('inc.navbar')
    <div class="container">

        @if (Request::is('/'))
            @include('inc.showcase')
        @endif

        @include('inc.messages');
        
        <div class="row">
            <div class="col-md-8 col-lg-8">
                @yield('content')
            </div>

            <div class="col-md-4 col-lg-4">
                @include('inc.sidebar')
            </div>
        </div>
    </div>
    <div id="footer" class="footer text-center bg-dark text-white">
        <p>Copyright 2020 &copy; akSmartDeveloper.com</p>
    </div>    
</body>
</html>

