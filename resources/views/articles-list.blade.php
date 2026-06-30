<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles list</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Articles List</h1>
    @foreach($articles as $ article)
        <div>
            <h2>{{ $articles->title }}</h2>
            <p>{{ $articles->content }}</p>
        </div>
    @endforeach    
</body>
</html>