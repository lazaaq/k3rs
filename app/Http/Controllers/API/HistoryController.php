<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Accident;
use App\Models\B3s;
use App\Models\Disease;
use App\Models\Employee;
use App\Models\Pcras;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Employee $employee)
    {
        $accidents = Accident::select('created_at')->where('employee_id', $employee->id)->get()->toArray();
        foreach( $accidents as &$accident) {
            $accident['title'] = 'Kecelakaan Kerja';
        }

        $diseases = Disease::select('created_at')->where('employee_id', $employee->id)->get()->toArray();
        foreach( $diseases as &$disease) {
            $disease['title'] = 'Penyakit Akibat Kerja';
        }

        $pcras = Pcras::select('created_at')->where('employee_id', $employee->id)->get()->toArray();
        foreach( $pcras as &$pcra) {
            $pcra['title'] = 'Laporan PCRA';
        }

        $b3s = B3s::select('created_at')->where('employee_id', $employee->id)->get()->toArray();
        foreach( $b3s as &$b3) {
            $b3['title'] = 'Laporan Kejadian B3';
        }

        $results = collect(array_merge($accidents, $diseases, $pcras, $b3s));
        $sorted = $results->sortByDesc('created_at');
        $array = array();
        foreach($sorted as $sort){
            array_push($array, $sort);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan riwayat laporan',
            'history' => $array,

        ]);
    }
}
