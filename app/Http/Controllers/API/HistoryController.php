<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Accident;
use App\Models\Disease;
use App\Models\Employee;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Employee $employee)
    {
        $accidents = Accident::where('employee_id', $employee->id)->get()->toArray();
        foreach( $accidents as &$accident) {
            $accident['type'] = 'accident';
        }
        $diseases = Disease::where('employee_id', $employee->id)->get()->toArray();
        foreach( $diseases as &$disease) {
            $disease['type'] = 'disease';
        }
        $results = collect(array_merge($accidents, $diseases));
        $sorted = $results->sortByDesc('created_at');
        
        return response()->json([
            'message' => 'Success',
            'history' => $sorted,

        ]);
    }
}
