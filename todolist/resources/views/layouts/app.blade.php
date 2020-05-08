<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <title>Todo List</title>
</head>
@include('inc.navbar')
@include('inc.messages')
<body>
    <div class="container">
        @yield('content')
    </div>
</body>

<footer class="text-center"> Copyright 2020 </footer>
</html>