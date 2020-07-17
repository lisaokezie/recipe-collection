@include('template.header')

<div class="container mw-55 pb-5">

        <!--        Headline-->
        <div class="mx-auto px-3 pb-0 pt-4
                    pt-md-3 px-md-0 pt-md-5 pb-0 text-center text-md-left">
            <h2 class="display-4">{{$recipe->title}}</h2>

        </div>


        <!--        Recipe-->

        <div class="d-flex justify-content-center justify-content-md-start flex-wrap my-3">

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="restaurant-outline"></ion-icon>
                {{$recipe->servings}} Portionen
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="time-outline"></ion-icon>{{$recipe->time}} min
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="file-tray-full-outline"></ion-icon>Kategorie
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="star-outline"></ion-icon>
                {{$recipe->rating}}
            </span>

        </div>

        <h3>Beschreibung</h3>
        <p class="mb-4">{{$recipe->description}}</p>

        <h3>Zutaten</h3>

        <table class="table table-sm table-striped mb-4">
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
        </table>

        <h3>Zubereitung</h3>
        <p class="mb-4">{{$recipe->instructions}}</p>

        <!--        Actions-->

        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary">
                PDF
            </button>
            <a href="/recipe/{{$recipe->id}}/edit" role="button" class="btn btn-secondary">Edit</a>
            <button type="button" class="btn btn-secondary">Delete</button>
        </div>


        <div class="py-4">
            <a href="index.html">
                <ion-icon name="chevron-back-outline"></ion-icon><span class="p-2"><strong>Zurück</strong></span>
            </a>
        </div>
        <hr>

        <h3>Kommentare</h3>



    </div>