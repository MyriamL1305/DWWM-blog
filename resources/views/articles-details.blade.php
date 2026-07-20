@extends('layout.app')

@section('titre', $article->title)

@section('content')

<div>
    <a href="{{ URL('/articles')}}">Retour à liste</a>
</div>

<div>
    [{{$article->category->name}}]  [Tag 1] [Tag 2]
</div>
<h1>{{ $article->title }}</h1>
<div>
    Par {{$article->user->name ?? 'Edith Orial'}} . {{ $article->created_at->format('d M Y')}}
</div>

<div>

    <p>{{ $article->content }}</p>
</div>

@endsection
