<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmados;
use App\Models\Estado;


class ConfirmadosController extends Controller
{

    public function getAllCasos(){
        $confirmado = Confirmados::all();
        $total_confirmados = $confirmado->sum('casos');
        echo "<B>"."Casos confirmados: ".$total_confirmados."</B><br>";
    }
    
    public function casosConfirmadosEstado($idEstado){
        // $estado = Estado::find($idEstado);
        // $casosEstado = Confirmados::where('estado_id','=',$idEstado);
        // $totalCasos = $casosEstado->sum('casos');
        // echo "<B>"."Casos confirmados en el estado de ".$estado->nombre." : ".$totalCasos."</B><br>";

        $estado = Estado::find($idEstado)->confirmados;
        $totalCasos = $estado->confirmados->sum('casos');
        echo "<B>"."Casos confirmados en el estado de ".$estado->nombre." : ".$totalCasos."</B><br>";
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


    public function index(){

        self::all();
        // foreach(Confirmados::all() as $confirmado){
        //     echo "<B>".$confirmado->casos."</B><br>";
        // }

        //dd(Confirmados::all());
    }

    public function show($id){
        self::casosConfirmadosEstado($id);
    }
}
