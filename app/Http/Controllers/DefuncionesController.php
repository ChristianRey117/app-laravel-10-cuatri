<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defunciones;
use App\Models\Estado;


class DefuncionesController extends Controller
{
    public function getAllDefunciones(){
        $confirmado = Defunciones::all();
        $total_confirmados = $confirmado->sum('casos');
        echo "<B>"."Casos confirmados: ".$total_confirmados."</B><br>";
    }

    public function all(){
        $allEstados = Estado::all();
        $total = 0;
        foreach($allEstados as $estate){
            $totalCasos = $estate->confirmados->sum('casos');
            $total += $totalCasos;
            echo "<B>"."Casos confirmados en el estado de ".$estate->nombre." : ".$totalCasos."</B><br>";
        }
        echo "<B>"."Total de casos ".$total."</B><br>";

    }

    public function show():view{
        foreach(Defunciones::all() as $confirmado){
            echo $confirmado->casos;
        }

        dd(Defunciones::all());
    }
}
