<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    public function index(){
        // foreach(Estado::all() as $estado){
        //     echo "<B>".$estado->nombre."</B><br>";
        // }

        //dd(Estado::find($id));

        return view('estados.index');
    }

    public function show(string $id){
        foreach(Estado::all() as $estado){
            echo $estado->name;
        }

        //dd(Estado::find($id));
    }

    public function getEstados(){
        return response()->json(Estado::get());
    }

}
