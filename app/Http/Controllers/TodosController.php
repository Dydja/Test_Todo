<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use App\Models\categorie;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //Methode list

    public function list()
    {
        $liste = Todos::all();
        $category = categorie::all();
        return view("template.home",compact("liste","category"));
    }

    //create todos

    public function store(Request $request)
    {
        //Todos::create($request->all());
        $texte = $request->input('text');

        if($texte){
        $todo = new Todos();
        $todo->text = $texte;
        $todo->complete= 0;
        $todo->save();
        }
        return redirect("/");
    }
    //afficher le champ terminer à 1
    public function markAsDone($id)
    {
        $todo = Todos::find($id);
        if($todo){
            $todo->complete = 1;
            $todo->save();
        }
        return redirect()->route('todo.list');
    }

    //delete todos
    public function deleteTodo($id){
        $todo  = Todos::find($id);
        if($todo){
            $todo->delete();
        }
        return redirect()->route('todo.list');
    }
}
