<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regulasi;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'success',
            'regulasis' => Regulasi::all(),

        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $regulasi = Regulasi::create($validatedData);
        return response()->json([
            'message' => 'Success',
            'regulasi' => $regulasi,

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Regulasi $regulasi)
    {
        return response()->json([
            'message' => 'Success',
            'regulasi' => $regulasi,

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Regulasi $regulasi)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regulasi $regulasi)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',

        ]);

        $regulasi->update($validatedData);
        return response()->json([
            'message' => 'Success',
            'regulasi' => $regulasi,

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulasi $regulasi)
    {
        $regulasi->delete();
        return response()->json([
            'message' => 'Success',

        ], 200);
    }
}
