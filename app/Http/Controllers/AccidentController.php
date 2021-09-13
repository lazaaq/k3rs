<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\AccidentVictimEmployee;
use App\Models\AccidentVictimNonEmployee;
use App\Models\AccidentWitness;
use Illuminate\Http\Request;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/accident/index', [
            'active' => 'accident',
            'accidents' => Accident::paginate(10),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        
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
            'location' => 'required',
            'image' => 'required',

        ]);

        Accident::find($request->id)->update($validatedData);
        return redirect('/dashboard/accident/' . $request->id)->with('success_update', 'Data berhasil diubah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function show(Accident $accident)
    {
        return view('dashboard/accident/show', [
            'active' => '',
            'accident' => Accident::with('employee')->find($accident->id),
            'victim_employees' => AccidentVictimEmployee::with('accident', 'employee')->where('accident_id', $accident->id)->get(),
            'victim_non_employees' => AccidentVictimNonEmployee::with('accident')->where('accident_id', $accident->id)->get(),
            'witnesses' => AccidentWitness::with('accident')->where('accident_id', $accident->id)->get(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function edit(Accident $accident)
    {
        return view('dashboard/accident/edit', [
            'active' => '',
            'accident' => $accident,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Accident $accident)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accident $accident)
    {
        $accident->delete();
        return redirect('/dashboard/accident')->with('success_delete', 'Data berhasil dihapus!');
    }
}
