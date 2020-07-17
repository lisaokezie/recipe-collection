<!--        Form-->
<div class="container mw-55">
            <form action="/recipes" method="post">
            @csrf
                <div class="form-group">
                    <label for="title" name="title">Rezepttitel</label>
                    <input type="text" class="form-control" id="title">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" name="description">Beschreibung</label>
                    <textarea class="form-control" rows="3" id="description"></textarea>
                    @error('description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-outline-primary">Rezept erstellen</button>
            </form>

               
        </div>