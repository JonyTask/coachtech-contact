<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <title>Document</title>
    @yield('css')
</head>
<body>
    <header>
        <p>FashionablyLate</p>
        <div class="link-area">
            @yield('header')
        </div>
    </header>

    <main>
    @yield('content')
    </main>
</body>
</html>