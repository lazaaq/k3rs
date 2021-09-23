<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apar;

class AparController extends Controller
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
            'apars' => Apar::all(),
            
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
            'image' => 'required',
            'time' => 'required',
            'location' => 'required',
            'code' => 'required',
            'expired' => 'required',
            'condition' => 'required',
            'detail' => 'required',
        ]);

        $apar = Apar::create($validatedData);
        return response()->json([
            'message' => 'Success',
            'apar' => $apar,

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apar $apar)
    {
        return response()->json([
            'message' => 'Success',
            'apar' => $apar,

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apar $apar)
    {
        $validatedData = $request->validate([
            'condition' => 'required',
            'detail' => 'required',
        ]);

        $apar->update([
            'condition' => $validatedData['condition'],
            'detail' => $validatedData['detail']
        ]);

        return response()->json([
            'message' => 'Success',
            'apar' => $apar,

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apar $apar)
    {
        $apar->delete();
        return response()->json([
            'message' => 'Success',
            
        ], 200);
    }
}
