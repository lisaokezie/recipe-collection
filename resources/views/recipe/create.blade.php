@include('template.header')

<div class="container pb-5">

        <!--        Headline-->

        <div class="mx-auto px-3 py-3 pt-md-5 pb-md-4 text-left">
            <h2 class="display-4">Neues Rezept</h2>

        </div>

        <form action="/recipes" method="post">

            @include('template.form')

        </form>

    </div>