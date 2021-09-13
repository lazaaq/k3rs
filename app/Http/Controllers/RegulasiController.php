<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/regulasi/index', [
            'regulasi' => Regulasi::latest()->paginate(10),
            'active' => 'regulasi',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/regulasi/create', [
            'active' => '',

        ]);
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',

        ]);

        Regulasi::create($validatedData);
        return redirect('/dashboard/regulasi')->with('success_added', 'Data berhasil ditambahkan!');
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
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',

        ]);

        $regulasi = Regulasi::find($request->id);
        $regulasi->update($validatedData);
        
        return redirect('/dashboard/regulasi/' . $request->id)->with('success_update', 'Data berhasil diubah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regulasi  $regulasi
     * @return \Illuminate\Http\Response
     */
    public function show(Regulasi $regulasi)
    {
        return view('dashboard/regulasi/show', [
            'active' => '',
            'regulasi' => $regulasi,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regulasi  $regulasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Regulasi $regulasi)
    {
        return view('dashboard/regulasi/edit', [
            'active' => '',
            'regulasi' => $regulasi,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regulasi  $regulasi
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Regulasi $regulasi)
    // {
        
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regulasi  $regulasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulasi $regulasi)
    {
        $regulasi->delete();
        return redirect('/dashboard/regulasi')->with('success_delete', 'Data berhasil dihapus!');
    }
}
