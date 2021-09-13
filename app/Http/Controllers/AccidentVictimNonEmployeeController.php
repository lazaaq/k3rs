<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\AccidentVictimNonEmployee;
use Illuminate\Http\Request;

class AccidentVictimNonEmployeeController extends Controller
{
    public function index(Accident $accident, AccidentVictimNonEmployee $victim)
    {
        return view('dashboard/accident/victim_non_employee/index', [
            'active' => '',
            'accident' => $accident,
            'victim' => $victim,

        ]);
    }
}
