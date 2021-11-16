<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Regulasi;
use App\Models\Apar;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Briefing;
use App\Models\Accident;
use App\Models\B3s;
use App\Models\Disease;
use App\Models\Pcras;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/index', [
            'title' => 'K3RS | Dashboard',
            'active' => 'dashboard',
            'regulasi_count' => Regulasi::all()->count(),
            'apar_count' => Apar::all()->count(),
            'news_count' => News::all()->count(),
            'employee_count' => Employee::all()->count(),
            'manager_count' => Manager::all()->count(),
            'briefing_count' => Briefing::all()->count(),
            'accident_count' => Accident::all()->count(),
            'disease_count' => Disease::all()->count(),
            'pcra_count' => Pcras::all()->count(),
            'b3s_count' => B3s::all()->count(),
        ]);
    }
}
