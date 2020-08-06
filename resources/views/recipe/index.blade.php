@extends('template.app')

@section('title', 'Startseite')

@if(!empty($query))
    @section('headline', e($query))
@else
    @section('headline','Rezeptsammlung')
@endif

@section('content')
    <div class="card-columns">
        @forelse($recipes as $recipe)

        @include('template.card')

        @empty
            <p class="text-left">Keine Rezepte vorhanden</p>
        @endforelse
    </div>
    {{ $recipes->links() }}
@endsection
