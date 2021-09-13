<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\AccidentWitness;
use Illuminate\Http\Request;

class AccidentWitnessController extends Controller
{
    public function index(Accident $accident, AccidentWitness $witness)
    {
        return view('dashboard/accident/witness/index', [
            'active' => '',
            'accident' => $accident,
            'witness' => $witness,
            
        ]);
    }
}
