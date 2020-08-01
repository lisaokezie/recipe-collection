@extends('template.app')

@section('title', ' ' . e($recipe->title))

@section('headline', 'Rezept')

@section('content')
<div class="container mw-55 pb-5">
    <h3>{{$recipe->title}}</h3>


        <!--        Headline-->
        <!-- <div class="mx-auto px-3 pb-0 pt-4
                    pt-md-3 px-md-0 pt-md-5 pb-0 text-center text-md-left">
            <h2 class="display-4">{{$recipe->title}}</h2>

        </div> -->


        <!--        Recipe-->

        <div class="d-flex justify-content-center justify-content-md-start flex-wrap my-3">

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="restaurant-outline"></ion-icon>
                {{$recipe->servings}} Portion(en)
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="time-outline"></ion-icon>{{$recipe->time}} min
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="file-tray-full-outline"></ion-icon>
                {{$recipe->category->name}}
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="star-outline"></ion-icon>
                {{$recipe->rating}}
            </span>

        </div>

        <p><strong>Verfasser: </strong>{{$recipe->user->name}}</p>

        <h3>Beschreibung</h3>
        <p class="mb-4">{{$recipe->description}}</p>

        <h3>Zutaten</h3>

        @foreach($recipe->ingredients as $ingredient)
            <p>{{$ingredient->pivot->amount}} {{$units->find($ingredient->pivot->unit_id)->name}} {{$ingredient->name}}</p>
        @endforeach

        <!-- <table class="table table-sm table-striped mb-4">
            <thead>
                <tr>
                    <th scope="col">Menge</th>
                    <th scope="col">Einheit</th>
                    <th scope="col">Zutat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>450</td>
                    <td>g</td>
                    <td>Mehl</td>
                </tr>
                <tr>
                    <td>300</td>
                    <td>g</td>
                    <td>Zucker</td>
                </tr>
                <tr>
                    <td>300</td>
                    <td>g</td>
                    <td>Butter</td>
                </tr>
            </tbody>
        </table> -->

        <h3>Zubereitung</h3>
        <p class="mb-4">{{$recipe->instructions}}</p>

    <div role="group">
    <!-- <button type="button" class="btn btn-outline-primary">PDF erstellen</button> -->

        <a href="/recipes/{{$recipe->id}}/edit" role="button" class="btn btn-outline-primary mr-1">Bearbeiten</a>

        <form action="/recipes/{{$recipe->id}}" method="post" style="display: inline;">
                @method('DELETE')
                @csrf
            <button class="btn btn-outline-danger">Löschen</button>
        </form>
    </div>

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
        <button class="btn btn-outline-primary">Senden</button>
    </form>
    @endauth
    @guest
        <p>Loggen Sie sich ein, um einen Kommentar zu schreiben</p>
    @endguest

    <div class="py-2">

    @forelse($recipe->comments as $comment)
    <hr>
    <div><strong>User: {{$comment->user->name}}</strong></div>
    <p>{{$comment->text}}</p>

    @empty
        <p>Keine Kommentare vorhanden</p>
    @endforelse

    @endsection
    </div>
