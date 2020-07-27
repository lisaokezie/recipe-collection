@extends('template.app')

@section('title', 'Kategorien')

@section('headline', 'Kategorien')

@section('content')

    <ul class="category-list">
        @forelse($categories as $category)

            <li>
                <a href="#">{{$category->name}}</a>
            </li>
        @empty
            <p>Keine Kategorien vorhanden</p>
        @endforelse
    </ul>
@endsection
