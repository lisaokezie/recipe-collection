<!--        Form-->
                @csrf
                <!-- title -->
                <div class="form-group">
                    <label for="title">Rezepttitel</label>
                    <input name="title" class="form-control" type="text" id="title" value="{{old('title') ?? $recipe->title}}">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <!-- description -->
                <div class="form-group">
                    <label for="description">Beschreibung</label>
                    <textarea name="description" class="form-control" rows="3" maxlength="200" id="description">{{old('description') ?? $recipe->description}}</textarea>
                    @error('description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    <small class="form-text text-muted mb-4">Maximal 200 Zeichen</small>
                </div>
                <!-- Category -->
                <div class="form-group">
                    <label for="category">Kategorie</label>
                    <select name="category.id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ $category->id == $recipe->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                    </select>

                    @error('category')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                
                </div>

                <div class="form-row">

                    <!-- servings -->
                    <div class="form-group col col-md">
                        <label for="servings">Portionen</label>
                        <input name="servings" type="number" class="form-control" value="{{old('servings') ?? $recipe->servings}}" min="1" max="100">
                        @error('servings')
                            <div class="text-danger">{{$message}}</div>
                        @enderror                    
                    </div>

                    <!-- time -->
                    <div class="form-group col col-md">
                        <label for="time">Zeitaufwand</label>
                        <div class="input-group mb-3">
                            <input name="time" type="number" class="form-control" value="{{old('time') ?? $recipe->time}}" min="1">
                            <div class="input-group-append">
                                <span class="input-group-text">min</span>
                            </div>
                        </div>    
                        @error('time')
                            <div class="text-danger">{{$message}}</div>
                        @enderror                                      
                    </div>

                    <!-- rating -->
                    <div class="form-group col col-md">
                        <label for="rating">Bewertung</label>
                        <div class="input-group mb-3">
                            <input name="rating" type="number" class="form-control" value="{{old('rating') ?? $recipe->rating}}" max="5" min="0">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="material-icons md-18">star_outline</i>
                                </span>
                            </div>
                        </div>
                        @error('rating')
                        <div class="text-danger">{{$message}}</div>
                        @enderror 
                        </div>                   
                    </div>

            @if(Request::path() === 'recipes/create')
                 <!-- ingredientlist erstellen -->

                 <fieldset>
                 <legend>Zutaten</legend>

                 <table class="table table-bordered" id="dynamicTable">  
                <tr>
                    <th>Zutat</th>
                    <th>Menge</th>
                    <th>Einheit</th>
                    <th>Hinzufügen/Entfernen</th>
                </tr>
                <tr>  
                    <td><input type="text" name="ingredients[0][name]" value="{{old('ingredients.0.name')}}" required placeholder="Zutat" class="form-control" /></td>  
                    <td><input type="text" name="ingredients[0][amount]" value="{{old('ingredients.0.amount')}}"required placeholder="Menge" class="form-control" /></td>  
                    <td><input type="text" name="ingredients[0][unit]" value="{{old('ingredients.0.unit')}}" required placeholder="Einheit" class="form-control" /></td>  
                    <td><button type="button" name="add" id="add" class="btn btn-success">Mehr Hinzufügen</button></td>  
                </tr>  
                </table> 
                <small class="form-text text-muted mb-4">Jede Zutat benötigt eine Mengenangabe und eine Einheit.</small>

                </fieldset>

                <!-- Ingredientlist bearbeiten -->
                @else
                <fieldset>
                 <legend>Zutaten</legend>

                 <table class="table table-bordered" id="dynamicTable">  
                <tr>
                    <th>Zutat</th>
                    <th>Menge</th>
                    <th>Einheit</th>
                    <th>Hinzufügen/Entfernen</th>
                </tr>


                @foreach($recipe->ingredients as $ingredient)
                    @if ($loop->first)
                    <tr>  
                    
                    <td><input type="text" name="ingredients[{{$loop->index}}][name]" value="{{$ingredient->name}}" required placeholder="Zutat" class="form-control" /></td>  
                    <td><input type="text" name="ingredients[{{$loop->index}}][amount]" value="{{$ingredient->pivot->amount}}" required placeholder="Menge" class="form-control" /></td>  
                    <td><input type="text" name="ingredients[{{$loop->index}}][unit]" value="{{$units->find($ingredient->pivot->unit_id)->name}}" required placeholder="Einheit" class="form-control" /></td>  
                    <td><button type="button" name="add" id="add" class="btn btn-success">Mehr Hinzufügen</button></td>  

                    </tr>  
                    
                    @else
                <tr>
                    <td><input type="text" name="ingredients[{{$loop->index}}][name]" value="{{$ingredient->name}}" required placeholder="Zutat" class="form-control" /></td>
                <td><input type="text" name="ingredients[{{$loop->index}}][amount]" value="{{$ingredient->pivot->amount}}" required placeholder="Menge" class="form-control" /></td>
                <td><input type="text" name="ingredients[{{$loop->index}}][unit]" value="{{$units->find($ingredient->pivot->unit_id)->name}}" required placeholder="Einheit" class="form-control" /></td>
                <td><button type="button" class="btn btn-danger remove-tr">Löschen</button></td>
                </tr>
                @endif

                <script>
                     var i = {{$loop->count}};
                </script>
                @endforeach


                </table> 

                <small class="form-text text-muted mb-4">Jede Zutat benötigt eine Mengenangabe und eine Einheit.</small>

                </fieldset>

            @endif
                <!-- instructions -->
                <div class="form-group">
                    <label for="instructions">Zubereitung</label>
                    <textarea name="instructions" class="form-control" rows="3">{{old('instructions') ?? $recipe->instructions}}</textarea>
                    @error('instructions')
                        <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>

                <div class="form-group d-flex flex-column">
                    <label for="image">Rezeptbild</label>
                    <input type="file" name="image" class="py-2">
                    <small class="form-text text-muted mb-4">Optional
                    </small>

                    @error('image')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>  
                
<script type="text/javascript">
   
   @if(Request::path() === 'recipes/create')
    var i = 0;
    @endif
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="ingredients['+i+'][name]" required placeholder="Zutat" class="form-control" /></td><td><input type="text" name="ingredients['+i+'][amount]" required placeholder="Menge" class="form-control" /></td><td><input type="text" name="ingredients['+i+'][unit]" required placeholder="Einheit" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Löschen</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
                    

               
