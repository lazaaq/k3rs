<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Accident;
use App\Models\Disease;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NotifController extends Controller
{
    public function index()
    {
        $accidents = Accident::all()->toArray();
        foreach ($accidents as &$accident) {
            $accident['type'] = 'accident';
        }
        $diseases = Disease::all()->toArray();
        foreach ($diseases as &$disease) {
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
