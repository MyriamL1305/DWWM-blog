<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles list</title>

    
</head>{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<body>
    <h1>Articles List</h1>
    @foreach($articles as $article)
        <div>
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
        </div>
    @endforeach    
</body>
</html>