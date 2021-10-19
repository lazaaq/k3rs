<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\B3s;
use App\Models\B3sAction;
use App\Models\B3sDetail;
use Illuminate\Http\Request;

class B3sController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan semua B3',
            'b3s' => B3s::with(['action', 'detail'])->get(),
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan satu B3',
            'pcra' => B3s::with(['action', 'detail'])->find($id),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'type' => 'required',
            'chronology' => 'required',
            'action_supervisor_room' => 'required',
            'action_supervisor_sanitasi' => 'required',
            'action_eliminate' => 'required',
            'action_glove' => 'required',
            'action_waste' => 'required',
            'detail_human' => 'required',
            'detail_wash' => 'required',
            'detail_injury' => 'required',
            'detail_tool' => 'required',
            'detail_effect' => 'required',
            'detail_follow_up' => 'required',
        ]);
        $b3s = B3s::create([
            'employee_id' => $validatedData['employee_id'],
            'location' => $validatedData['location'],
            'datetime' => $validatedData['datetime'],
            'type' => $validatedData['type'],
            'chronology' => $validatedData['chronology'],
        ]);
        B3sAction::create([
            'b3s_id' => $b3s->id,
            'supervisor_room' => $validatedData['action_supervisor_room'],
            'supervisor_sanitasi' => $validatedData['action_supervisor_sanitasi'],
            'eliminate' => $validatedData['action_eliminate'],
            'glove' => $validatedData['action_glove'],
            'waste' => $validatedData['action_waste'],
        ]);
        B3sDetail::create([
            'b3s_id' => $b3s->id,
            'human' => $validatedData['detail_human'],
            'wash' => $validatedData['detail_wash'],
            'injury' => $validatedData['detail_injury'],
            'tool' => $validatedData['detail_tool'],
            'effect' => $validatedData['detail_effect'],
            'follow_up' => $validatedData['detail_follow_up'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'data B3 berhasil disimpan',
            'b3s' => B3s::with(['action', 'detail'])->find($b3s->id)
        ]);
    }
}