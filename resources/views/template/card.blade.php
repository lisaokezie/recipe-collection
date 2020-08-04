<a href="/recipes/{{$recipe->id}}" style="color: black; text-decoration: none">
            <div class="card mb-3">
            @if($recipe->image)
                <img class="card-img-top" src="{{asset('storage/' . $recipe->image)}}" alt="Rezept-Bild" style="max-height: 200px; object-fit:cover;">
            @endif    
                <div class="card-body">
                    <h5 class="card-title">{{$recipe->title}}</h5>
                    <p class="card-text text-muted">{{$recipe->description}}</p>
                    <!-- <p class="card-text"><small class="text-muted center-icons"> </small></p> -->

                    <div class="text-muted center-icons meta-info">
                            <span class="center-icons"><i class="material-icons md-18">inbox</i>{{$recipe->category->name}}</span>
                            <span class="center-icons"><i class="material-icons md-18">schedule</i>{{$recipe->time}} min</span>
                            <span class="center-icons"><i class="material-icons md-18">star_outline</i>{{$recipe->rating}}</span>
                
                    </div>
                </div>


                <!-- <div class="card-footer text-muted">
                {{$recipe->time}} min
                </div> -->
            </div>
        </a>