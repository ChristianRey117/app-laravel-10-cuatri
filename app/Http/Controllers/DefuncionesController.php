<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defunciones;


class DefuncionesController extends Controller
{
    public function show():view{
        foreach(Defunciones::all() as $confirmado){
            echo $confirmado->casos;
        }

        dd(Defunciones::all());
    }
}
