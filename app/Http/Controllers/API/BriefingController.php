<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Briefing;
use App\Models\BriefingPresence;
use Illuminate\Http\Request;

class BriefingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan semua data briefing',
            'briefings' => Briefing::with(['briefing_presence'])->get(),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Briefing $briefing)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Briefing $briefing)
    {
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan satu data briefing',
            'briefings' => Briefing::with(['briefing_presence'])->find($briefing->id),
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Briefing $briefing)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required'
        ]);

        BriefingPresence::create([
            'briefing_id' => $briefing->id,
            'employee_id' => $validatedData['employee_id']
        ]);

        return response()->json([
            'success' => true,
            'messsage' => 'data Briefing berhasil di update'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Briefing $briefing)
    {
        $briefing->delete();
        return response()->json([
            'success' => true,
            'message' => 'data briefing berhasil dihapus',
        ],200);
    }
}
