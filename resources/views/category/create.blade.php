@extends('template.app')

@section('title', 'Neue Kategorie')

@section('headline', 'Neue Kategorie erstellen')

@section('content')

<form action="/categories" method="post" class="mx-auto" style="max-width: 25em;">
    @csrf
    <div class="form-group">
        <label for="name">Kategorie</label>
        <input name="name" class="form-control" type="text" id="name" value="{{old('name')}}">
        @error('name')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-outline-primary mb-5">Erstellen</button>

</form>

@endsection