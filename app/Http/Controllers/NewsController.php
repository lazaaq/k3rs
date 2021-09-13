<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/news/index', [
            'active' => 'news',
            'newss' => News::latest()->paginate(10),

        ]);
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'image' => 'required',
            'excerpt' => 'required',
            'body' => 'required',

        ]);
        News::create($validatedData);
        return redirect('/dashboard/news')->with('success_added', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/news/create', [
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
            'title' => 'required',
            'author' => 'required',
            'image' => 'required',
            'excerpt' => 'required',
            'body' => 'required',

        ]);

        News::where('id', $request->id)->update($validatedData);

        // return redirect('/dashboard/news');
        return redirect('/dashboard/news/' . $request->id )->with('success_update', 'Data berhasil diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard/news/show', [
            'active' => '',
            'news' => News::find($id),

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
        return view('dashboard/news/edit', [
            'active' => '',
            'news' => News::find($id),
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
        $selectedData = News::find($id);
        $selectedData->delete();
        return redirect()->route('news.index')->with('success_delete', 'Data berhasil dihapus');
    }
}
