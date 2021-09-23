<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\AccidentWitnessNonEmployee;
use Illuminate\Http\Request;

class AccidentWitnessNonEmployeeController extends Controller
{
    public function index(Accident $accident, AccidentWitnessNonEmployee $witness)
    {
        return view('dashboard/accident/witness_non_employee/index',[
            'active' => '',
            'accident' => $accident,
            'witness' => $witness
        ]);
    }
}
