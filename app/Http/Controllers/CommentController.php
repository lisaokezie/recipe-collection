<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Comment;

class CommentController extends Controller
{
    /* Speichert einen Kommentar zu einem Rezept und verwendet den Namen des eingeloggten Users */
    public function store(Request $request, Recipe $recipe)
    {
        $comment = new Comment($this->validatedData());
        $comment->user_id = auth()->id();
        $recipe->comments()->save($comment);
        $recipe->refresh();
        $recipe->comments;
        return back();
    }

    /* Validiert die Eingabe des Nutzers */
    private function validatedData(){
        return request()->validate([
            'text' => 'required'
        ]);
    }
}
