<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'regulasis' => Regulasi::latest()->paginate(10),
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
            'active' => 'regulasi',

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
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file('file');
        $folder_tujuan = 'storage/regulasiFile';
        $filename = time() . "_" . $file->getClientOriginalName();
        $validatedData['file'] = $file->move($folder_tujuan, $filename);
        Regulasi::create($validatedData);
        return redirect('/dashboard/regulasi')->with('success_added', 'Regulasi baru berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regulasi  $regulasi
     * @return \Illuminate\Http\Response
     */
    // public function show(Regulasi $regulasi)
    // {
    //     return view('dashboard/regulasi/show', [
    //         'active' => '',
    //         'regulasi' => $regulasi,

    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regulasi  $regulasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Regulasi $regulasi)
    {
        return view('dashboard/regulasi/edit', [
            'active' => 'regulasi',
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
    public function update(Request $request, Regulasi $regulasi)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $folder_tujuan = 'storage/regulasiFile';
            $filename = time() . "_" . $file->getClientOriginalName();
            $validatedData['file'] = $file->move($folder_tujuan, $filename);
            File::delete($regulasi->file);
            $regulasi->update([
                'file' => $validatedData['file']
            ]);
        }

        $regulasi->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description']
        ]);

        return redirect('/dashboard/regulasi')->with('success_update', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regulasi  $regulasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulasi $regulasi)
    {
        File::delete($regulasi->file);
        $regulasi->delete();
        return redirect('/dashboard/regulasi')->with('success_delete', 'Data berhasil dihapus!');
    }
}
