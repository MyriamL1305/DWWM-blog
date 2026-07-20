@extends('layout.app')
@section('titre', 'Liste de catégories')
@section('content')
     <h1>Categories List</h1>
    @foreach($categories as $category)
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>{{ $category->name }}</h2>
                <span>{{ $category->articles->count() }} articles</span>

            </div>
            
        </div>
    @endforeach 
@endsection