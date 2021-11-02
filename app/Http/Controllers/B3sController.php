<?php

namespace App\Http\Controllers;

use App\Models\B3s;
use Illuminate\Http\Request;

class B3sController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/b3s/index',[
            'b3s' => B3s::paginate(10),
            'active' => 'b3s',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/b3s/create', [
            'active' => 'b3s'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'detail_opname' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\B3s  $b3s
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $b3 = B3s::find($id);
        return view('dashboard/b3s/show', [
            'b3' => $b3,
            'active' => 'b3s'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\B3s  $b3s
     * @return \Illuminate\Http\Response
     */
    public function edit(B3s $b3s)
    {
        return view('dashboard/b3s/create', [
            'b3' => $b3s,
            'active' => 'b3s'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\B3s  $b3s
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, B3s $b3s)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\B3s  $b3s
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b3s = B3s::find($id);
        $b3s->delete();
        return redirect('/dashboard/b3s')->with('success_deleted', 'B3 Berhasil dihapus!');
    }
}
