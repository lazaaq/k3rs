<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Accident;
use App\Models\B3s;
use App\Models\Disease;
use App\Models\Employee;
use App\Models\Pcras;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NotifController extends Controller
{
    public function index()
    {
        $accidents = Accident::all()->toArray();
        foreach ($accidents as &$accident) {
            $accident['type'] = 'Kecelakaan Kerja';
        }
        $diseases = Disease::all()->toArray();
        foreach ($diseases as &$disease) {
            $disease['type'] = 'Penyakit Akibat Kerja';
        }
        $pcras = Pcras::all()->toArray();
        foreach ($pcras as &$pcra) {
            $pcra['type'] = 'Laporan PCRA';
        }
        $b3s = B3s::all()->toArray();
        foreach ($b3s as &$b3) {
            $b3['type'] = 'Laporan Kejadian B3';
        }
        $results = collect(array_merge($accidents, $diseases));
        $sorted = $results->sortByDesc('created_at');

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan semua Notif',
            'history' => $sorted,

        ]);
    }
}
