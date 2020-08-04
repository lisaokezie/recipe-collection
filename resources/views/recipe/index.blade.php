@extends('template.app')

@section('title', 'Startseite')

@section('headline','Rezeptsammlung')

@section('content')
    <div class="card-columns">
        @forelse($recipes as $recipe)

        @include('template.card')

        @empty
            <p class="text-center">Keine Rezepte vorhanden</p>
        @endforelse
    </div>
    {{ $recipes->links() }}
@endsection
