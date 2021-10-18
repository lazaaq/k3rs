<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pcras;
use App\Models\PcrasAccessArea;
use App\Models\PcrasConstruction;
use App\Models\PcrasDetail;
use App\Models\PcrasDocumentation;
use App\Models\PcrasTraffic;
use Illuminate\Http\Request;

class PcraController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Success',
            'pcras' => Pcras::with(['construction', 'access_areas', 'traffic', 'detail', 'documentation'])->get(),
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'message' => 'Success',
            'pcra' => Pcras::with(['construction', 'access_areas', 'traffic', 'detail', 'documentation'])->find($id)
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'location' => 'required',
            'surveyor' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'dept' => 'required',
            'plan' => 'required',
            'apd' => 'required',
            'warning' => 'required',
            'const_dust' => 'required',
            'const_barrier' => 'required',
            'const_door_access' => 'required',
            'const_dusty_area' => 'required',
            'const_sign_door' => 'required',
            'const_vent' => 'required',
            'const_comment' => '',
            'access_plafon' => 'required',
            'access_floor_clean' => 'required',
            'access_wall' => 'required',
            'access_floor_dustfree' => 'required',
            'access_vent' => 'required',
            'access_insect' => 'required',
            'access_comment' => '',
            'traffic_barrier' => 'required',
            'traffic_remove_puing' => 'required',
            'traffic_route' => 'required',
            'traffic_access' => 'required',
            'traffic_comment' => '',
            'detail_not_eligible' => 'required',
            'detail_reported' => 'required',
            'detail_reporting_date' => 'required',
            'detail_re_survey_date' => 'required',
            'detail_surveyor' => 'required',
            'detail_accordance' => 'required',
            'detail_further_action' => 'required',
            'docs_image' => 'required',
            'docs_keterangan' => 'required',
        ]);
        $pcra = Pcras::create([
            'employee_id' => $validatedData['employee_id'],
            'name' => $validatedData['name'],
            'location' => $validatedData['location'],
            'surveyor' => $validatedData['surveyor'],
            'time_start' => $validatedData['time_start'],
            'time_end' => $validatedData['time_end'],
            'dept' => $validatedData['dept'],
            'plan' => $validatedData['plan'],
            'apd' => $validatedData['apd'],
            'warning' => $validatedData['warning'],
        ]);
        PcrasConstruction::create([
            'pcras_id' => $pcra->id,
            'dust' => $validatedData['const_dust'],
            'barrier' => $validatedData['const_barrier'],
            'door_access' => $validatedData['const_door_access'],
            'dusty_area' => $validatedData['const_dusty_area'],
            'sign_door' => $validatedData['const_sign_door'],
            'vent' => $validatedData['const_vent'],
            'comment' => $validatedData['const_comment'] ?? NULL,
        ]);
        PcrasAccessArea::create([
            'pcras_id' => $pcra->id,
            'plafon' => $validatedData['access_plafon'],
            'floor_clean' => $validatedData['access_floor_clean'],
            'wall' => $validatedData['access_wall'],
            'floor_dustfree' => $validatedData['access_floor_dustfree'],
            'vent' => $validatedData['access_vent'],
            'insect' => $validatedData['access_insect'],
            'comment' => $validatedData['access_comment'] ?? NULL,
        ]);
        PcrasTraffic::create([
            'pcras_id' => $pcra->id,
            'barrier' => $validatedData['traffic_barrier'],
            'remove_puing' => $validatedData['traffic_remove_puing'],
            'route' => $validatedData['traffic_route'],
            'access' => $validatedData['traffic_access'],
            'comment' => $validatedData['traffic_comment'] ?? NULL,
        ]);
        PcrasDetail::create([
            'pcras_id' => $pcra->id,
            'not_eligible' => $validatedData['detail_not_eligible'],
            'reported' => $validatedData['detail_reported'],
            'reporting_date' => $validatedData['detail_reporting_date'],
            're_survey_date' => $validatedData['detail_re_survey_date'],
            'surveyor' => $validatedData['detail_surveyor'],
            'accordance' => $validatedData['detail_accordance'],
            'further_action' => $validatedData['detail_further_action'],
        ]);
        PcrasDocumentation::create([
            'pcras_id' => $pcra->id,
            'image' => $validatedData['docs_image'],
            'keterangan' => $validatedData['docs_keterangan'],
        ]);
        return response()->json([
            'message' => 'Success',
            'pcra' => Pcras::with(['construction', 'access_areas', 'traffic', 'detail', 'documentation'])->find($pcra->id)
        ]);
    }
}

