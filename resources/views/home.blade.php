@extends('template.app')

@section('title', 'Dashboard')

@section('headline', 'Hallo, ' . e(Auth::user()->name) . '!')

@section('content')
    <div class="row justify-content-center">

    <!-- <div class="row"> -->
        <div class="col-sm col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">Aktionen</div>
                <div class="list-group list-group-flush">
                    <a href="/recipes/create" class="list-group-item list-group-item-action">
                        Neues Rezept erstellen            
                    </a>
                    <a href="/categories/create" class="list-group-item list-group-item-action">
                        Neue Kategorie erstellen            
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm col-lg-8">
        <!-- @if (session('status'))
            <div class="alert alert-secondary" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="alert alert-info" role="alert">
                {{ __('You are logged in!') }}
            </div> -->

            <div class="card">
                <div class="card-header">
                    Meine Rezepte
                </div>

            <div class="list-group list-group-flush">
            @forelse(Auth::user()->recipes as $recipe)
                <a href="/recipes/{{$recipe->id}}" class="list-group-item list-group-item-action">
                {{$recipe->title}}
                </a>
                @empty
                <a href="#" class="list-group-item list-group-item-action">
                    Keine Rezepte vorhanden
                </a>
                @endforelse
                </div>
        </div>
    </div>  
    <!-- </div> -->

    </div>

@endsection