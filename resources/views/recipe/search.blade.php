@extends('template.app')

@section('title', 'Suche')

@if(isset($details))
@section('headline', 'Suchergebnisse')

@section('content')
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach($details as $recipe)

            @include('template.card')

        @endforeach
        </div>

@endsection
@endif
