<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Briefing;
use App\Models\BriefingPresence;
use Faker\Provider\Lorem;
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
            'message' => 'Success',
            'briefings' => Briefing::all(),

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'time' => 'required',
            'result' => 'required',
        ]);
        
        $briefing = Briefing::create($validatedData);

        $presences = array();

        if ($request->has('presence')){
            for ($i=0; $i<count($request->presence); $i++){
                $briefing_presence = BriefingPresence::create([
                    'briefing_id' => $briefing->id,
                    'employee_id' => $request->presence[$i]['employee_id'],
                    'presence' => $request->presence[$i]['presence'],

                ]);
                array_push($presences, $briefing_presence);
            }
        }

        return response()->json([
            'message' => 'Success',
            'briefing' => $briefing,
            'presences' => $presences,

        ], 200);
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
            'message' => 'Success',
            'briefing' => $briefing,
            'presences' => BriefingPresence::where('briefing_id', $briefing->id)->first()->get(),

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
            'time' => 'required',
            'result' => 'required',
        ]);

        $briefing->update($validatedData);

        $presences = array();

        if ($request->has('presence')){
            for ($i=0; $i<count($request->presence); $i++){
                $briefing_presence = BriefingPresence::find($request->presence[$i]->id);
                $briefing_presence->update([
                    'briefing_id' => $briefing->id,
                    'employee_id' => $request->presence[$i]->employee_id,
                    'presence' => 1,

                ]);
                array_push($presences, $briefing_presence);
            }
        }
        return response()->json([
            'messsage' => 'Success',
            'briefing' => $briefing,
            'presences' => $presences
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
            'message' => 'Success',
        ],200);
    }
}
