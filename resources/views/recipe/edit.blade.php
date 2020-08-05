@extends('template.app')

@section('title', 'Rezept bearbeiten')

@section('headline', 'Rezept bearbeiten')

@section('content')
        <form action="/recipes/{{$recipe->id}}" method="post" enctype="multipart/form-data" class="mx-auto maxwidth">
        @method('PATCH')

            @include('template.form')

            <button type="submit" class="btn btn-outline-primary mb-5">Rezept aktualisieren</button>
        </form>
@endsection