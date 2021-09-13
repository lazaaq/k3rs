<?php

namespace App\Http\Controllers;

use App\Models\Briefing;
use App\Models\BriefingPresence;
use App\Models\Employee;
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
        return view('dashboard/briefing/index',[
            'active' => 'briefing',
            'briefings' => Briefing::latest()->paginate(10),

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
            'result' => 'required',

        ]);
        Briefing::where('id', $request->id)->update($validatedData);
        return redirect('/dashboard/briefing')->with('success_update', 'Data berhasil diubah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Briefing  $briefing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard/briefing/show', [
            'active' => '',
            'briefing' => Briefing::find($id),
            'briefing_presence' => BriefingPresence::where('briefing_id', $id)->get(),
            'employees' => Employee::all(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Briefing  $briefing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard/briefing/edit', [
            'active' => '',
            'briefing' => Briefing::find($id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Briefing  $briefing
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Briefing $briefing)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Briefing  $briefing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selectedData = Briefing::find($id);
        $selectedData->delete();
        return redirect('/dashboard/briefing')->with('success_delete', 'Data berhasil dihapus!');
    }
}
