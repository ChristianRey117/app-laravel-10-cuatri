<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    public function show(string $id):view{
        foreach(Estado::all() as $estado){
            echo $estado->name;
        }

        dd(Estado::find($id));
    }

}
