<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
        *{
            font-family: sans-serif;
        }
        h1,h2,h3{
            
            /* font-weight: 800; */
        }

       ul{
           list-style: none;
           margin: 0;
           padding: 0;
       }
       li{
           margin-bottom: 10px;
       }
    </style>
  </head>
  <body>
      <main style="padding: 10px;">
      <h1>{{$recipe->title}}</h1>
      <p>{{$recipe->servings}} Portion(en) | {{$recipe->time}} min | Kategorie: {{$recipe->category->name}} | Bewertung: {{$recipe->rating}}/5</p>
      <p><strong>Verfasser: </strong>{{$recipe->user->name}}</p>
      <p>{{$recipe->description}}</p>
    
      <div>
          <h2>Zutaten</h2>
          <ul>
            @foreach($recipe->ingredients as $ingredient)
                <li>{{$ingredient->pivot->amount}} {{$units->find($ingredient->pivot->unit_id)->name}} {{$ingredient->name}}</li>
            @endforeach
          </ul>
      </div>

      <div>
          <h2>Zubereitung</h2>
          <p class="mb-4">{{$recipe->instructions}}</p>
      </div>
    </main>

</body>

