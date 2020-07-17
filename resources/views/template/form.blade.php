<!--        Form-->
                @csrf
                <!-- title -->
                <div class="form-group">
                    <label for="title">Rezepttitel</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ old('title') ?? $recipe->title}}">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <!-- description -->
                <div class="form-group">
                    <label for="description">Beschreibung</label>
                    <textarea name="description" class="form-control" rows="3" id="description">{{ old('description') ?? $recipe->description}}</textarea>
                    @error('description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <!-- Category -->

                <div class="form-group">
                    <label for="category">Kategorie</label>
                    <select name="category" class="form-control">
                        <option>Options</option>
                        
                    </select>
                    @error('category')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                </div>

                <div class="form-row">

                    <!-- servings -->
                    <div class="form-group col col-md">
                        <label for="servings">Portionen</label>
                        <input name="servings" type="number" class="form-control" value="{{ old('servings') ?? $recipe->servings}}">
                        @error('servings')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                    </div>

                    <!-- time -->
                    <div class="form-group col col-md">
                        <label for="time">Zeitaufwand</label>
                        <div class="input-group mb-3">
                            <input name="time" type="number" class="form-control" value="{{ old('time') ?? $recipe->time}}">
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
                            <input name="rating" type="number" class="form-control" value="{{ old('rating') ?? $recipe->rating}}">
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

                <!--  ingredient -->
                <div class="form-row">
                    <div class="form-group col col-md-6">
                        <label for="ingredient" >Zutat</label>
                        <input name="ingredient" type="text" class="form-control">
                        @error('ingredient')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <!-- amount -->
                    <div class="form-group col col-md-2">
                        <label for="amount">Menge</label>
                        <input name="amount"type="text" class="form-control">
                        @error('amount')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <!-- unit -->
                    <div class="form-group col col-md-4">
                        <label for="unit">Einheit</label>
                        <select name="unit" class="form-control">
                            <option selected>g</option>
                            <option>ml</option>
                        </select>
                        @error('unit')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>

                </div>

                <!-- instructions -->
                <div class="form-group">
                    <label for="instructions">Zubereitung</label>
                    <textarea name="instructions" class="form-control" rows="3">{{ old('instructions') ?? $recipe->instructions}}</textarea>
                </div>
                @error('instructions')
                        <div class="text-danger">{{$message}}</div>
                    @enderror




               
