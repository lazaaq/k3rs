<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accident;
use App\Models\AccidentWitnessEmployee;

class AccidentWitnessEmployeeController extends Controller
{
    public function index(Accident $accident, AccidentWitnessEmployee $witness)
    {
        return view('dashboard/accident/witness_employee/index', [
            'active' => '',
            'accident' => $accident,
            'witness' => $witness
        ]);
    }
}
