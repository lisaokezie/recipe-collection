@include('template.header')

<div class="container pb-5">

        <div class="mx-auto px-3 py-3 pt-md-5 pb-md-4 text-left">
            <h2 class="display-4">Rezept bearbeiten</h2>
        </div>

        <form action="/recipes/{{$recipe->id}}" method="post">
        @method('PATCH')

            @include('template.form')

            <button type="submit" class="btn btn-outline-primary">Rezept aktualisieren</button>

        </form>

    </div>