<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
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
        return response()->json([
            'message' => 'Success',
            'employees' => Employee::all(),
            
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
        ]);

        $employee = Employee::create($validatedData);
        return response()->json([
            'message' => 'Success',
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
        return response()->json([
            'message' => 'Success',
            'employee' => $employee,

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
            'name' => $validatedData['email'],
            'name' => $validatedData['address']
        ]);
        return response()->json([
            'message' => 'Success',
            'employee' => $employee,

        ], 200);
    }

    public function ganti_password(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required',
            'password_repass' => 'required',
        ]);
        if (!Hash::check($validatedData['password_old'], $employee->password)){
            return response()->json([
                'message' => 'Unauthorized',
                'error' => 'Password_old salah!',
            ],401);
        }
        if ($validatedData['password_new'] != $validatedData['password_repass']){
            return response()->json([
                'message' => 'Unauthorized',
                'error' => 'Password_new dan password_repass tidak sama!',
            ],401);
        }
        $employee->update([
            'password' => Hash::make($validatedData['password_new'])
        ]);
        return response()->json([
            'message' => 'Success',
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
            'message' => 'Success',

        ], 200);
    }
}
