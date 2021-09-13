<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseWitness;
use Illuminate\Http\Request;

class DiseaseWitnessController extends Controller
{
    public function index(Disease $disease, DiseaseWitness $witness)
    {
        return view('dashboard/disease/witness/index', [
            'active' => '',
            'disease' => $disease,
            'witness' => $witness,
        ]);
    }
}
