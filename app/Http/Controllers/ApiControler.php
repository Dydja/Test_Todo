<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiControler extends Controller
{
    //
    public function listApi(){
        return response()->json(Concert::all());
    }

    //Creation des data

    public function create()
    {
        return view('template.test');
    }


    public function store(Request $request)
    {

        $name = $request->input('name');
        if($name){
            $concert = new Concert();
            $concert->name = $name;
            $concert->save();
            return response()->json(["status" => "success"]);
          }else{
            return response()->json(["status" => "error"]);
          }

          // 3. On enregistre les informations du Post
            Concert::create([
                "name" => $request->name,

            ]);

    }

    public function deleteApi($id){
        $concert = Concert::find($id);
        if($concert){
            $concert->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }

}
