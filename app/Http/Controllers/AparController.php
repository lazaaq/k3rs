<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apar;
use App\Models\AparHistory;
use Illuminate\Support\Facades\File;

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
    public function create()
    {
        return view('dashboard/apar/create', [
            'active' => '',

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
            'time' => 'required',
            'location' => 'required',
            'code' => 'required',
            'expired' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $folder_tujuan = 'storage/aparImage';
            $filename = time() . "_" . $file->getClientOriginalName();
            $validatedData['image'] = $file->move($folder_tujuan, $filename);
        }
        
        Apar::create([
            'time' => $validatedData['time'],
            'location' => $validatedData['location'],
            'code' => $validatedData['code'],
            'expired' => $validatedData['expired'],
            'last_image' => $validatedData['image']
        ]);

        return redirect('/dashboard/apar')->with('success_added', 'Apar Berhasil Disimpan!');
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
            'history_apar' => AparHistory::where('apar_id', $id)->get()
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
        $apar = Apar::find($id);
        $validatedData = $request->validate([
            'time' => 'required',
            'location' => 'required',
            'code' => 'required',
            'expired' => 'required',
        ]);

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $folder_tujuan = 'storage/aparImage';
        //     $filename = time() . "_" . $file->getClientOriginalName();
        //     $validatedData['image'] = $file->move($folder_tujuan, $filename);
        //     File::delete($apar->image);
        //     $apar->update([
        //         'image' => $validatedData['image']
        //     ]);
        // }

        $apar->update([
            'time' => $validatedData['time'],
            'location' => $validatedData['location'],
            'code' => $validatedData['code'],
            'expired' => $validatedData['expired'],
        ]);

        return redirect('/dashboard/apar/' . $request->id)->with('success_updated', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apar = Apar::find($id);
        $history_apar = AparHistory::where('apar_id', $apar->id)->get();
        foreach($history_apar as $history){
            File::delete($history->image);
            $history->delete();
        }
        File::delete($apar->last_image);
        $apar->delete();
        return redirect()->route('apar.index')->with('success_delete', 'Data berhasil dihapus');
    }
}
