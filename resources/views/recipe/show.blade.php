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
                8 Portionen
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="time-outline"></ion-icon>90 min
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="file-tray-full-outline"></ion-icon>Kategorie
            </span>

            <span class="chip mx-1 mx-md-0 mr-md-3">
                <ion-icon name="star-outline"></ion-icon>
                5
            </span>

        </div>

        <h3>Beschreibung</h3>
        <p class="mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>

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
        <p class="mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>


        <!--        Actions-->



        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary">
                PDF
            </button>
            <button type="button" class="btn btn-secondary">Edit</button>
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