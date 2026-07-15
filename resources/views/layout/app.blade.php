<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>

<body>
    <div style="">NAVBAR</div>

    <main>
        @yield('content')
    </main>

    <div>FOOTER</div>
</body>
</html>


