<!--        Form-->
                @csrf
                <!-- title -->
                <div class="form-group">
                    <label for="title">Rezepttitel</label>
                    <input name="title" class="form-control" type="text" id="title" value="">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <!-- description -->
                <div class="form-group">
                    <label for="description">Beschreibung</label>
                    <textarea name="description" class="form-control" rows="3" id="description"></textarea>
                    @error('description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <!-- Category -->

                <div class="form-group">
                    <label for="category">Kategorie</label>
                    <select name="category.id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>

                    @error('category')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                </div>

                <div class="form-row">

                    <!-- servings -->
                    <div class="form-group col col-md">
                        <label for="servings">Portionen</label>
                        <input name="servings" type="number" class="form-control" value="">
                        @error('servings')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                    </div>

                    <!-- time -->
                    <div class="form-group col col-md">
                        <label for="time">Zeitaufwand</label>
                        <div class="input-group mb-3">
                            <input name="time" type="number" class="form-control" value="">
                            <div class="input-group-append">
                                <span class="input-group-text">min</span>
                            </div>
                        </div>
                        @error('time')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                    </div>

                    <!-- rating -->
                    <div class="form-group col col-md">
                        <label for="rating">Bewertung</label>
                        <div class="input-group mb-3">
                            <input name="rating" type="number" class="form-control" value="">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <ion-icon name="star-outline"></ion-icon>
                                </span>
                            </div>
                        </div>
                        @error('rating')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                    </div>
                </div>

                 <!-- ingredients -->

                 <fieldset>
                 <legend>Zutaten</fieldset>

                 <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>Zutat</th>
                <th>Menge</th>
                <th>Einheit</th>
                <th>Hinzufügen/Entfernen</th>
            </tr>
            <tr>  
                <td><input type="text" name="ingredients[0][name]" placeholder="Zutat" class="form-control" /></td>  
                <td><input type="text" name="ingredients[0][amount]" placeholder="Menge" class="form-control" /></td>  
                <td><input type="text" name="ingredients[0][unit]" placeholder="Einheit" class="form-control" /></td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">Mehr Hinzufügen</button></td>  
            </tr>  
        </table> 

    </fieldset>

                <!-- <div class="form-row">
                    <div class="form-group col col-md-6">
                        <label for="ingredient.name" >Zutat</label>
                        <input name="ingredient" type="text" class="form-control">
                        @error('ingredient')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div> -->
                    <!-- amount -->
                    <!-- <div class="form-group col col-md-2">
                        <label for="amount">Menge</label>
                        <input name="amount"type="text" class="form-control">
                        @error('amount')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div> -->
                    <!-- unit -->
                    <!-- <div class="form-group col col-md-4">
                        <label for="unit">Einheit</label>
                        <select name="unit" class="form-control">
                            <option selected>g</option>
                            <option>ml</option>
                        </select>
                        @error('unit')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>

                </div> -->

                <!-- instructions -->
                <div class="form-group">
                    <label for="instructions">Zubereitung</label>
                    <textarea name="instructions" class="form-control" rows="3"></textarea>
                </div>
                @error('instructions')
                        <div class="text-danger">{{$message}}</div>
                    @enderror

        <script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="ingredients['+i+'][name]" placeholder="Zutat" class="form-control" /></td><td><input type="text" name="ingredients['+i+'][amount]" placeholder="Menge" class="form-control" /></td><td><input type="text" name="Mehr Hinzufügen['+i+'][einheit]" placeholder="Einheit" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Löschen</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
                    

               
