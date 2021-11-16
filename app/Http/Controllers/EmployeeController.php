<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Manager;
use App\Models\Salary;
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
            'employees' => Employee::with(['manager'])->latest()->paginate(10),
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
            'active' => 'employee',
            'managers' => Manager::all(),
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
            'manager_id' => 'required',
            'salary_id' => 'required',
            'email' => 'required',
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
            'active' => 'employee',
            'employee' => Employee::with(['manager', 'salary'])->find($id),
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
            'active' => 'employee',
            'employee' => Employee::with(['manager', 'salary'])->find($id),
            'managers' => Manager::all(),
            'salaries' => Salary::all()->sortBy('salary_amount'),

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
