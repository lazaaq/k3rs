<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseVictimEmployee;
use App\Models\DiseaseVictimNonEmployee;
use App\Models\DiseaseWitnessEmployee;
use App\Models\DiseaseWitnessNonEmployee;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/disease/index', [
            'active' => 'disease',
            'diseases' => Disease::paginate(10),

        ]);
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
            'location' => 'required',
            'image' => 'required',

        ]);

        Disease::find($request->id)->update($validatedData);
        return redirect('/dashboard/disease/' . $request->id)->with('success_update', 'Data berhasil diubah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        return view('dashboard/disease/show', [
            'active' => 'disease',
            'disease' => Disease::with('employee')->find($disease->id), 
            'victim_employees' => DiseaseVictimEmployee::with('disease', 'employee')->where('disease_id', $disease->id)->get(),
            'victim_non_employees' => DiseaseVictimNonEmployee::with('disease')->where('disease_id', $disease->id)->get(),
            'witness_employee' => DiseaseWitnessEmployee::with(['disease', 'employee'])->where('disease_id', $disease->id)->get(),
            'witness_non_employee' => DiseaseWitnessNonEmployee::with('disease')->where('disease_id', $disease->id)->get(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
        return view('dashboard/disease/edit', [
            'active' => 'disease',
            'disease' => $disease,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Disease $disease)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        $disease->delete();
        return redirect('/dashboard/disease')->with('success_delete', 'Data berhasil dihapus!');
    }
}
