<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\AccidentVictimEmployee;
use Illuminate\Http\Request;

class AccidentVictimEmployeeController extends Controller
{
    public function index(Accident $accident, AccidentVictimEmployee $victim)
    {
        return view('dashboard/accident/victim_employee/index', [
            'active' => '',
            'accident' => $accident,
            'victim' => AccidentVictimEmployee::with('employee')->find($victim->id),

        ]);
    }
}
