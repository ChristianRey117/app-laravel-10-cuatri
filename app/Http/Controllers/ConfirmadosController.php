<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmados;


class ConfirmadosController extends Controller
{
    public function show():view{
        foreach(Confirmados::all() as $confirmado){
            echo $confirmado->casos;
        }

        dd(Confirmados::all());
    }
}
