@extends('template.app')

@section('title', ' ' . e($recipe->title))

@section('headline', ' ' . e($recipe->title))

@section('content')

<div class="recipe pb-5 mx-auto maxwidth">
        @if($recipe->image)
            <div class="img-container mb-4">
                <img src="{{asset('storage/' . $recipe->image)}}" alt="" class="img-fluid">
            </div>
        @endif

        <div class="d-flex justify-content-center justify-content-md-start flex-wrap my-3">
            <span class="chip mx-1 mx-md-0 mr-md-2">
            <i class="material-icons md-18">local_dining</i>
                {{$recipe->servings}} Portion(en)
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-2">
            <i class="material-icons md-18">schedule</i>{{$recipe->time}} min
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-2">
            <i class="material-icons md-18">inbox</i>
                {{$recipe->category->name}}
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-2">
                <i class="material-icons md-18">star_outline</i>
                {{$recipe->rating}}
            </span>

        </div>

        <p><strong>Verfasser: </strong>{{$recipe->user->name}}</p>

        <h3 class="mt-4">Beschreibung</h3>
        <p class="mb-4">{{$recipe->description}}</p>

        <h3 class="mt-5">Zutaten</h3>

        @foreach($recipe->ingredients as $ingredient)
            <p>{{$ingredient->pivot->amount}} {{$units->find($ingredient->pivot->unit_id)->name}} {{$ingredient->name}}</p>
        @endforeach

        <h3 class="mt-5">Zubereitung</h3>
        <p class="mb-4">{{$recipe->instructions}}</p>

            <a href="{{action('RecipeController@downloadPDF', $recipe->id)}}" role="button" class="btn btn-outline-primary">PDF erstellen</a>

    @auth
    @if(Auth::user()->id == $recipe->user_id)
    <div role="group" class="mt-4">
        <a href="/recipes/{{$recipe->id}}/edit" role="button" class="btn btn-outline-primary mr-1">Bearbeiten</a>
        <form action="/recipes/{{$recipe->id}}" method="post" style="display: inline;">
                @method('DELETE')
                @csrf
            <button class="btn btn-outline-danger">Löschen</button>
        </form>
    </div>
    @endif
    @endauth

    <section class="mt-5">
    <hr>

    <h3>Kommentare</h3>

    @auth
    <form action="/recipes/{{$recipe->id}}/comments" method="post">
        @csrf
        <div class="form-group">
            <label for="text">Kommentar schreiben</label>
            <textarea name="text" class="form-control" rows="3" id="text"></textarea>
                @error('text')
                    <div class="text-danger">{{$message}}</div>
                @enderror
        </div>
        <button class="btn btn-secondary">Senden</button>
    </form>
    @endauth
    @guest
        <p>Loggen Sie sich ein, um einen Kommentar zu schreiben</p>
    @endguest

    <div class="py-2">

    @forelse($recipe->comments->sortByDesc('created_at') as $comment)
    <hr>
    <div class="user-info"><strong>{{$comment->user->name}}</strong></div>
        <p>{{$comment->text}}</p>
        @empty
            <p>Keine Kommentare vorhanden</p>
        @endforelse

    </section>
    </div>
    @endsection
