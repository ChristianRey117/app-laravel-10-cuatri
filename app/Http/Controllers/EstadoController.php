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
    public function getDataCovid(){
        $estados = Estado::all();
        $totalConfirmados = 0;
        $totalDefunciones = 0;
        $totalSospechosos = 0;
        $totalNegativos = 0;

        foreach($estados as $estado){
            $totalCasosConf = $estado->confirmados->sum('casos');
            $totalConfirmados += $totalCasosConf;

            $totalCasosDef = $estado->defunciones->sum('casos');
            $totalDefunciones += $totalCasosDef;

            $totalCasosSos = $estado->sospechosos->sum('casos');
            $totalSospechosos += $totalCasosSos;

            $totalCasosNega = $estado->negativos->sum('casos');
            $totalNegativos += $totalCasosNega;
        }

        $responseConfirmados = new \stdClass();
        $responseDefunciones = new \stdClass();
        $responseSospechosos = new \stdClass();
        $responseNegativos = new \stdClass();
    
        $responseConfirmados->category = "Confirmados";
        $responseConfirmados->value = $totalConfirmados;

        $responseDefunciones->category = "Defunciones";
        $responseDefunciones->value = $totalDefunciones;

        $responseSospechosos->category = "Sospechosos";
        $responseSospechosos->value = $totalSospechosos;

        $responseNegativos->category = "Negativos";
        $responseNegativos->value = $totalNegativos;

        return response()->json(array($responseConfirmados, $responseDefunciones, $responseSospechosos, $responseNegativos));
    }


}
