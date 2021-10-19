<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;

class ManagerController extends Controller
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
            'message' => 'Berhasil mendapatkan semua manager',
            'manager' => Manager::with(['employee', 'salary'])->get(),
            
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
            'salary_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'telp' => 'required',
        ]);

        $manager = Manager::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'data Manager berhasil disimpan',
            'manager' => Manager::with(['employee', 'salary'])->find($manager->id),
            
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan satu manager',
            'manager' => Manager::with(['employee', 'salary'])->find($manager->id),

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
    public function update(Request $request, Manager $manager)
    {
        $validatedData = $request->validate([
            'salary_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'birth' => 'required',
            'gender' => 'required',
        ]);
        $manager->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'data Manager berhasil diupdate',
            'manager' => $manager,

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
        return response()->json([
            'success' => true,
            'message' => 'data Manager berhasil dihapus',

        ], 200);
    }
}
