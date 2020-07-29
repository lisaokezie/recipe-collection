@extends('template.app')

@section('title', 'Kategorien')

@section('headline', 'Kategorien')

@section('content')

    <ul class="category-list">
        @forelse($categories as $category)

            <li>
                <a href="{{ route('recipes.index', ['category' => $category->id])}}">{{$category->name}}</a>
            </li>
        @empty
            <div class="mx-auto text-center">Keine Kategorien vorhanden</div>
        @endforelse
    </ul>
@endsection
