<?php

namespace App\Http\Controllers;

use App\Models\Pcras;
use Illuminate\Http\Request;

class PcraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/pcra/index', [
            'active' => 'pcra',
            'pcras' => Pcras::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/pcra/create', [
            'active' => 'pcra',
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
            'name' => 'required',
            'location' => 'required',
            'surveyor' => 'required',
            'time_start' => 'required|date',
            'time_end' => 'required|date',
            'dept' => 'required',
            'plan' => 'required',
            'apd' => 'required',
            'warning' => 'required',
        ]);
        Pcras::create([
            $validatedData
        ]);

        return redirect('/dashboard/pcra')->with('success_added', 'Pcra baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pcra = Pcras::with(['construction', 'access_areas', 'traffic', 'detail', 'documentation'])->find($id);
        return view('dashboard/pcra/show', [
            'active' => 'pcra',
            'pcra' => $pcra
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pcras $pcra)
    {
        return view('dashboard/pcra/edit', [
            'active' => 'pcra',
            'pcra' => $pcra
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pcras $pcra)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'surveyor' => 'required',
            'time_start' => 'required|date',
            'time_end' => 'required|date',
            'dept' => 'required',
            'plan' => 'required',
            'apd' => 'required',
            'warning' => 'required',
        ]);
        $pcra->update([
            $validatedData
        ]);

        return redirect('/dashboard/pcra')->with('success_updated', 'Pcra berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pcras $pcra)
    {
        $pcra->delete();
        return redirect('/dashboard/pcra')->with('success_deleted', 'Pcra berhasil dihapus!');
    }
}
