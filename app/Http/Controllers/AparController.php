<?php

namespace App\Http\Controllers;

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
        return view('dashboard/apar/index', [
            'apars' => Apar::latest()->paginate(10),
            'active' => 'apar',
            
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

        $validatedData = $request->validate(
            [
                'time' => 'required',
                'location' => 'required',
                'code' => 'required',
                'expired' => 'required',
                'condition' => 'required',
                'detail' => 'required',
            ]
        );

        Apar::where('id', $request->id)->update($validatedData);

        return redirect('/dashboard/apar')->with('success_update', 'Data Berhasil Diubah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard/apar/show', [
            'active' => '',
            'apar' => Apar::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard/apar/edit', [
            'active' => '',
            'apar' => Apar::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selectedData = Apar::find($id);
        $selectedData->delete();
        return redirect()->route('apar.index')->with('success_delete', 'Data berhasil dihapus');
    }
}
