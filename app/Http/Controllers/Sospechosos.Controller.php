<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sospechosos;


class SospechososController extends Controller
{
    public function show():view{
        foreach(Sospechosos::all() as $sospechoso){
            echo $sospechoso->casos;
        }

        dd(Sospechosos::all());
    }
}
