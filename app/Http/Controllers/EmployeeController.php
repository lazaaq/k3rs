<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/employee/index', [
            'employees' => Employee::latest()->paginate(10),
            'active' => 'employee',
            
        ]);
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'manager_id' => 'required',
            'salary_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'birth' => 'required',
            'gender' => 'required',
        ]);
        Employee::create($validatedData);
        return redirect('/dashboard/employee')->with('success_added', 'Data berhasil ditambahkan!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/employee/create', [
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
            'name' =>'required',
            'email' => 'required', //fix this = email:dns
            'address' => 'required',
            'birth' => 'required',
            'gender' => 'required',
        ]);
        Employee::where('id', $request->id)->update($validatedData);
        return redirect('dashboard/employee/' . $request->id)->with('success_update', 'Data berhasil diubah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard/employee/show', [
            'active' => '',
            'employee' => Employee::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard/employee/edit', [
            'active' => '',
            'employee' => Employee::find($id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selectedData = Employee::find($id);
        $selectedData->delete();
        return back()->with('success_delete', 'Data berhasil dihapus!');
    }
}
