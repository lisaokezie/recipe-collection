@extends('template.app')

@section('title', 'Neues Rezept')

@section('headline', 'Neues Rezept erstellen')

@section('content')
        <form action="/recipes" method="post" enctype="multipart/form-data">

        @include('template.form')

        <button type="submit" class="btn btn-outline-primary mb-5">Rezept erstellen</button>

        </form>

@endsection
