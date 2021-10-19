<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
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
            'message' => 'Berhasil mendapatkan semua News',
            'newss' => News::all(),

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
            'author' => 'required',
            'image' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
        $validatedData['slug'] = Str::of($validatedData['title'])->slug('-');
        $news = News::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'data News berhasil disimpan',
            'news' => $news,

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan satu News',
            'news' => $news,

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
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'image' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
        $news->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'data News berhasil diupdate',
            'news' => $news,

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json([
            'success' => true,
            'message' => 'data News berhasil dihapus',

        ],200);
    }
}
