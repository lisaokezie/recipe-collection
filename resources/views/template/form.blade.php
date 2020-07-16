<!--        Form-->
<div class="container mw-55">
            <form action="/recipes" method="post">
            @csrf
                <div class="form-group">
                    <label for="titel" name="titel">Rezepttitel</label>
                    <input type="text" class="form-control">
                    <div class="invalid-feedback">Example invalid feedback text</div>
                </div>

                <div class="form-group">
                    <label for="Beschreibung">Beschreibung</label>
                    <textarea class="form-control" rows="3"></textarea>
                    <div class="invalid-feedback">Example invalid feedback text</div>

                </div>

                <div class="form-group">
                    <label for="kategorie" name="kategorie">Kategorie</label>
                    <select class="form-control">
                        <option>Options</option>
                        
                    </select>
                    <div class="invalid-feedback">Example invalid feedback text</div>
                </div>

                <div class="form-row">

                    <div class="form-group col col-md">
                        <label for="portionen" name="portionen">Portionen</label>
                        <input type="number" class="form-control">
                        <div class="invalid-feedback">Example invalid feedback text</div>
                    </div>

                    <div class="form-group col col-md">
                        <label for="portionen" name="portionen">Zeitaufwand</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">min</span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Example invalid feedback text</div>
                    </div>

                    <div class="form-group col col-md">
                        <label for="bewertung" name="bewertung">Bewertung</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <ion-icon name="star-outline"></ion-icon>
                                </span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Example invalid feedback text</div>
                    </div>
                </div>

                <!--            Zutaten-->

                <div class="form-row">
                    <div class="form-group col col-md-6">
                        <label for="zutat" name="menge">Zutat</label>
                        <input type="text" class="form-control">
                        <div class="invalid-feedback">Example invalid feedback text</div>

                    </div>
                    <div class="form-group col col-md-2">
                        <label for="menge" name="menge">Menge</label>
                        <input type="text" class="form-control">
                        <div class="invalid-feedback">Example invalid feedback text</div>

                    </div>
                    <div class="form-group col col-md-4">
                        <label for="einheit" name="einheit">Einheit</label>
                        <select class="form-control">
                            <option selected>g</option>
                            <option>ml</option>
                        </select>
                        <div class="invalid-feedback">Example invalid feedback text</div>

                    </div>

                </div>


                <div class="form-group">
                    <label for="Beschreibung">Zubereitung</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <div class="invalid-feedback">Example invalid feedback text</div>


                <button type="submit" class="btn btn-outline-primary">Rezept erstellen</button>
            </form>
        </div>