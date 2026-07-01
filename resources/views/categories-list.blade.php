<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
</head>
<body>
     <h1>Categories List</h1>
    @foreach($categories as $category)
        <div>
            <p>{{ $category->name }}</p>
        </div>
    @endforeach 
</body>
</html>