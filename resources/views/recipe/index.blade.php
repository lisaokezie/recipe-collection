@include('template.header')


<div class="container">

<div class="mx-auto px-3 py-3 pt-md-5 pb-md-4 text-center">
            <h2 class="display-4">Rezepte</h2>
            <a href="/recipe/create" class="btn btn-outline-primary" role="button">Neues Rezept erstellen</a>
        </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @forelse($recipes as $recipe)
        <div class="col mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{$recipe->title}}</h5>
                    <p class="card-text">{{$recipe->description}}</p>
                </div>
            </div>
        </div>
        @empty
            <p>Keine Rezepte vorhanden</p>

        @endforelse
    </div>

</div>