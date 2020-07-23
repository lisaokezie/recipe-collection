@extends('template.app')

@section('title', 'Startseite')

@section('headline', 'Rezeptsammlung')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @forelse($recipes as $recipe)

        @include('template.card')

        @empty
            <p>Keine Rezepte vorhanden</p>
        @endforelse
    </div>
@endsection
