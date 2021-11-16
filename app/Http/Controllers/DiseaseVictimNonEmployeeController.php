<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseVictimNonEmployee;
use Illuminate\Http\Request;

class DiseaseVictimNonEmployeeController extends Controller
{
    public function index(Disease $disease, DiseaseVictimNonEmployee $victim)
    {
        return view('dashboard/disease/victim_non_employee/index', [
            'active' => 'disease',
            'disease' => $disease,
            'victim' => $victim,

        ]);
    }
}
