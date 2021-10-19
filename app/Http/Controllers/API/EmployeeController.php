<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Salary;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('manager', 'salary')->get();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan semua employee',
            'employees' => $employees,

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
            'manager_id' => 'required',
            'salary_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'job' => 'required',
        ]);

        $employee = Employee::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'data Employee berhasil disimpan',
            'employee' => $employee,

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $emp['id'] = $employee->id;
        $emp['manager_id'] = $employee->manager_id;
        $emp['salary_id'] = $employee->salary_id;
        $emp['name'] = $employee->name;
        $emp['email'] = $employee->email;
        $emp['address'] = $employee->address;
        $emp['birth'] = $employee->birth;
        $emp['gender'] = $employee->gender;
        $emp['job'] = $employee->job;
        $emp['position'] = $employee->position;
        $emp['telp'] = $employee->telp;

        $manager = Manager::find($employee->manager_id);
        $mngr['name'] = $manager->name;
        $mngr['address'] = $manager->address;
        $mngr['telp'] = $manager->telp;
        $emp['manager'] = $mngr;

        $salary = Salary::find($employee->salary_id);
        $slry['day'] = $salary->day;
        $slry['month'] = $salary->month;
        $slry['wholesale'] = $salary->wholesale;
        $emp['salary'] = $slry;

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendapatkan satu employee',
            'employee' => $emp,

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $employee->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address']
        ]);
        return response()->json([
            'success' => 'true',
            'message' => 'data employee berhasil diupdate',
            'employee' => $employee,

        ], 200);
    }

    public function change_password(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required',
            'password_repass' => 'required',
        ]);
        if (!Hash::check($validatedData['password_old'], $employee->password)) {
            return response()->json([
                'message' => 'Unauthorized',
                'error' => 'Password_old salah!'
            ], 401);
        }
        if ($validatedData['password_new'] != $validatedData['password_repass']) {
            return response()->json([
                'message' => 'Failed',
                'error' => 'Password_new dan password_repass tidak sama!',
            ], 402);
        }
        $employee->update([
            'password' => Hash::make($validatedData['password_new'])
        ]);
        return response()->json([
            'success' => true,
            'message' => 'data password employee berhasil diupdate'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'success' => true,
            'message' => 'data Employee berhasil dihapusd',

        ], 200);
    }
}
