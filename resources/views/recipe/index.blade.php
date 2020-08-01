@extends('template.app')

@section('title', 'Startseite')

@section('headline','Rezeptsammlung')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @forelse($recipes as $recipe)

        @include('template.card')

        @empty
            <div class="mx-auto text-center">Keine Rezepte vorhanden</div>
        @endforelse
    </div>
@endsection
