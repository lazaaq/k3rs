<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apar;
use App\Models\AparHistory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
            'success' => true,
            'message' => 'Berhasil mendapatkan semua apar',
            'apars' => Apar::with(['history'])->get(),

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
            'time' => 'required',
            'location' => 'required',
            'code' => 'required',
            'expired' => 'required',
        ]);

        $apar = Apar::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'data Apar berhasil disimpan',
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
            'success' => true,
            'message' => 'Berhasil mendapatkan satu apar',
            'apar' => Apar::with(['history'])->find($apar->id),

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
            'image' => 'required'
        ]);

        //store image
        $folderPath = "storage/aparImage/";

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;

        file_put_contents($file, $image_base64);

        $validatedData['image'] = $file;

        AparHistory::create([
            'apar_id' => $apar->id,
            'condition' => $validatedData['condition'],
            'detail' => $validatedData['detail'],
            'image' => $validatedData['image']
        ]);

        $apar->update([
            'last_image' => $validatedData['image'],
            'last_condition'=> $validatedData['condition'],
            'last_detail' => $validatedData['detail']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'data Apar berhasil di update',
            'apar' => Apar::with(['history'])->find($apar->id),

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
            'success' => true,
            'message' => 'data apar berhasil dihapus',

        ], 200);
    }
}
