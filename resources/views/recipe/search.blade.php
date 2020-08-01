@extends('template.app')

@section('title', 'Suche')


@if(isset($details))
    @section('headline', 'Ergebnisse für ' . e($query))
@else
    @section('headline', 'Keine Ergebnisse')
@endif


@section('content')
    @if(isset($details))
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach($details as $recipe)

            @include('template.card')

        @endforeach
        </div>
    @else
    <p class="text-center">Keine Rezepte vorhanden</p>
    @endif

@endsection
