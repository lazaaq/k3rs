<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseWitnessNonEmployee;
use Illuminate\Http\Request;

class DiseaseWitnessNonEmployeeController extends Controller
{
    public function index(Disease $disease, DiseaseWitnessNonEmployee $witness)
    {
        return view('dashboard/disease/witness_non_employee/index',[
            'active' => 'disease',
            'disease' => $disease,
            'witness' => $witness
        ]);
    }
}
