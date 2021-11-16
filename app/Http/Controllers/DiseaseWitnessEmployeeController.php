<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseWitnessEmployee;
use Illuminate\Http\Request;

class DIseaseWitnessEmployeeController extends Controller
{
    public function index(Disease $disease, DiseaseWitnessEmployee $witness)
    {
        return view('dashboard/disease/witness_employee/index', [
            'active' => 'disease',
            'disease' => $disease,
            'witness' => $witness
        ]);
    }
}
