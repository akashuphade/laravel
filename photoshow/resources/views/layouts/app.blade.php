<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photoshow</title>

    <!--Style-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
    @include('inc.navbar')
    @include('inc.messages')
    <main class="py-4">
        <div class="container">
            @yield('content')    
        </div>
    </main>    
</body>
</html>