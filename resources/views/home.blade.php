@extends('template.app')

@section('title', 'Dashboard')

@section('headline', 'Hallo, ' . e(Auth::user()->name) . '!')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-secondary" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="alert alert-info" role="alert">
                {{ __('You are logged in!') }}
            </div>

            <div class="card">
    
            <div class="card-header">
                Meine Rezepte
            </div>
            <ul class="list-group list-group-flush">

            @forelse(Auth::user()->recipes as $recipe)
                <li class="list-group-item">
                    <a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a>
                </li>
                @empty
                <li class="list-group-item">Keine Rezepte vorhanden</li>
            @endforelse
            </ul>
            </div>
        </div>
    </div>
@endsection