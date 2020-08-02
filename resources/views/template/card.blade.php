<a href="/recipes/{{$recipe->id}}" style="color: black; text-decoration: none">
        <div class="col mb-4">
            <div class="card h-100">
            @if($recipe->image)
                <img class="card-img-top" src="{{asset('storage/' . $recipe->image)}}" alt="Rezept-Bild" style="max-height: 200px; object-fit:cover;">
            @endif    
                <div class="card-body">
                    <h5 class="card-title">{{$recipe->title}}</h5>
                    <p class="card-text">{{$recipe->description}}</p>
                </div>
            </div>
        </div>
        </a>