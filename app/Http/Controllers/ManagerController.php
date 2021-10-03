<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Salary;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/manager/index', [
            'managers' => Manager::with(['salary'])->latest()->paginate(10),
            'active' => 'manager',
        ]);
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'salary_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'birth' => 'required',
            'gender' => 'required',

        ]);
        Manager::create($validatedData);
        return redirect('/dashboard/manager')->with('success_added', 'Data berhasil ditambahkan!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/manager/create', [
            'active' => '',
            'salaries' => Salary::all()->sortBy('salary_amount'),

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
            'name' => 'required',
            'salary_id' => 'required',
            'email' => 'required',
            'address' => 'required',
            'birth' => 'required',
            'gender' => 'required',

        ]);

        Manager::where('id', $request->id)->update($validatedData);

        return redirect('dashboard/manager/' . $request->id)->with('success_update', 'Data berhasil diubah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        return view('dashboard/manager/show', [
            'active' => '',
            'manager' => $manager,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        return view('dashboard/manager/edit', [
            'active' => '',
            'manager' => $manager,
            'salaries' => Salary::all()->sortBy('salary_amount'),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
        
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect('dashboard/manager')->with('success_delete', 'Data berhasil dihapus');
    }
}
