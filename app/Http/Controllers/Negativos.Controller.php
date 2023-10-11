<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negativos;


class NegativosController extends Controller
{
    public function show():view{
        foreach(Negativos::all() as $negativo){
            echo $negativo->casos;
        }

        dd(Negativos::all());
    }
}
