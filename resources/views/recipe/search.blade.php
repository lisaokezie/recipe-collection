@extends('template.app')

@section('title', 'Suche')


@if(isset($details))
    @section('headline', 'Ergebnisse für ' . e($query))
@else
    @section('headline', 'Keine Ergebnisse')
@endif


@section('content')
    @if(isset($details))
        <div class="card-columns">
        @foreach($details as $recipe)

            @include('template.card')

        @endforeach
        </div>
    @else
    <p class="text-center">Keine Rezepte vorhanden</p>
    @endif

@endsection
