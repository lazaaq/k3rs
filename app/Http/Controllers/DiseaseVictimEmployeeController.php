<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseVictimEmployee;
use Illuminate\Http\Request;

class DiseaseVictimEmployeeController extends Controller
{
    public function index(Disease $disease, DiseaseVictimEmployee $victim)
    {
        return view('dashboard/disease/victim_employee/index',[
            'active' => 'disease',
            'disease' => $disease,
            'victim' => DiseaseVictimEmployee::with('employee')->find($victim->id),

        ]);
    }
}
