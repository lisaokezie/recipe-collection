@include('template.header')

<div class="container pb-5">

        <!--        Headline-->
        <div class="mx-auto px-3 pb-0 pt-4
                    pt-md-3 px-md-0 pt-md-5 pb-3 text-center text-md-left">
            <h2 class="display-4">Rezept bearbeiten</h2>

        </div>

        <form action="/recipes/{{$recipe->id}}" method="post">
        @method('PATCH')

            @include('template.form')

            <button type="submit" class="btn btn-outline-primary">Rezept aktualisieren</button>

        </form>

    </div>