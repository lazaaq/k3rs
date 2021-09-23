<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Accident;
use App\Models\AccidentVictimEmployee;
use App\Models\AccidentVictimNonEmployee;
use App\Models\AccidentWitness;
use Illuminate\Http\Request;

class AccidentController extends Controller
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
            'accidents' => Accident::all(),

        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $victim_employee = array();
        $victim_non_employee = array();
        $witness = array();

        $accidentValidate = $request->validate([
            'accident_employee_id' => 'required',
            'accident_time' => 'required',
            'accident_location' => 'required',
            'accident_image' => 'required',

        ]);
        $accident = Accident::create([
            'employee_id' => $accidentValidate['accident_employee_id'],
            'time' => $accidentValidate['accident_time'],
            'location' => $accidentValidate['accident_location'],
            'image' => $accidentValidate['accident_image'],
        ]);

        // Victim Employee
        if ($request->has('victim_employee')) {
            for ($i = 0; $i < count($request->victim_employee); $i++) {
                $victim = $request->victim_employee[$i];

                $victim_employee_ = AccidentVictimEmployee::create([
                    'accident_id' => $accident->id,
                    'employee_id' => $victim['victim_employee_id'],
                    'salary_range' => $victim['victim_employee_salary_range'] ?? NULL,
                    'chronology' => $victim['victim_employee_chronology'] ?? NULL,
                    'first_aid' => $victim['victim_employee_first_aid'] ?? NULL,
                    'effect' => $victim['victim_employee_effect'] ?? NULL,
                    'condition' => $victim['victim_employee_condition'] ?? NULL,
                ]);

                array_push($victim_employee, $victim_employee_);
            }
        }

        // Victim Non Employee
        if ($request->has('victim_non_employee')) {
            for ($i = 0; $i < count($request->victim_non_employee); $i++) {
                $victim = $request->victim_non_employee[$i];

                $victim_non_employee_ = AccidentVictimNonEmployee::create([
                    'accident_id' => $accident->id,
                    'name' => $victim['victim_non_employee_name'] ?? NULL,
                    'birth' => $victim['victim_non_employee_birth'] ?? NULL,
                    'gender' => $victim['victim_non_employee_gender'] ?? NULL,
                    'address' => $victim['victim_non_employee_address'] ?? NULL,
                    'job' => $victim['victim_non_employee_job'] ?? NULL,
                ]);

                array_push($victim_non_employee, $victim_non_employee_);
            }
        }


        // Witness
        if ($request->has('witness')) {
            for ($i = 0; $i < count($request->witness); $i++) {
                $this_witness = $request->witness[$i];

                $witness_ = AccidentWitness::create([
                    'accident_id' => $accident->id,
                    'name' => $this_witness['witness_name'] ?? NULL,
                    'birth' => $this_witness['witness_birth'] ?? NULL,
                    'nik' => $this_witness['witness_nik'] ?? NULL,
                    'address' => $this_witness['witness_address'] ?? NULL,
                    'gender' => $this_witness['witness_gender'] ?? NULL,
                    'job' => $this_witness['witness_job'] ?? NULL,
                ]);

                array_push($witness, $witness_);
            }
        }

        return response()->json([
            'message' => 'Success',
            'accident' => $accident,
            'victim_employee' => $victim_employee,
            'victim_non_employee' => $victim_non_employee,
            'witness' => $witness

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Accident $accident)
    {
        return response()->json([
            'message' => 'Success',
            'accident' => $accident,
            'victim_employee' => AccidentVictimEmployee::where('accident_id', $accident->id)->get(),
            'victim_non_employee' => AccidentVictimNonEmployee::where('accident_id', $accident->id)->get(),
            'witness' => AccidentWitness::where('accident_id', $accident->id)->get(),

        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Accident $accident)
    // {
    //     $victim_employee = null;
    //     $victim_non_employee = null;
    //     $witness = null;

    //     $accidentValidate = $request->validate([
    //         'accident_employee_id' => 'required',
    //         'accident_time' => 'required',
    //         'accident_location' => 'required',
    //         'accident_image' => 'required',

    //     ]);
    //     $accident->update([
    //         'employee_id' => $accidentValidate['accident_employee_id'],
    //         'time' => $accidentValidate['accident_time'],
    //         'location' => $accidentValidate['accident_location'],
    //         'image' => $accidentValidate['accident_image'],

    //     ]);

    //     if ($request->has('victim_employee_id')) {
    //         $victim_employee_validate = $request->validate([
    //             'victim_employee_employee_id' => 'required',
    //             'victim_employee_salary_range' => 'required',
    //             'victim_employee_chronology' => 'required',
    //             'victim_employee_first_aid' => 'required',
    //             'victim_employee_effect' => 'required',
    //             'victim_employee_condition' => 'required',
    //         ]);

    //         $victim_employee = AccidentVictimEmployee::find($request->victim_employee_id);
    //         $victim_employee->update([
    //             'employee_id' => $victim_employee_validate['victim_employee_employee_id'],
    //             'salary_range' => $victim_employee_validate['victim_employee_salary_range'],
    //             'chronology' => $victim_employee_validate['victim_employee_chronology'],
    //             'first_aid' => $victim_employee_validate['victim_employee_first_aid'],
    //             'effect' => $victim_employee_validate['victim_employee_effect'],
    //             'condition' => $victim_employee_validate['victim_employee_condition'],
    //         ]);
    //     }

    //     if ($request->has('victim_non_employee_id')) {
    //         $victim_non_employee_validate = $request->validate([
    //             'victim_non_employee_name' => 'required',
    //             'victim_non_employee_birth' => 'required',
    //             'victim_non_employee_gender' => 'required',
    //             'victim_non_employee_address' => 'required',
    //             'victim_non_employee_job' => 'required',
    //         ]);

    //         $victim_non_employee = AccidentVictimNonEmployee::find($request->victim_non_employee_id);
    //         $victim_non_employee->update([
    //             'name' => $victim_non_employee_validate['victim_non_employee_name'],
    //             'birth' => $victim_non_employee_validate['victim_non_employee_birth'],
    //             'gender' => $victim_non_employee_validate['victim_non_employee_gender'],
    //             'address' => $victim_non_employee_validate['victim_non_employee_address'],
    //             'job' => $victim_non_employee_validate['victim_non_employee_job'],
    //         ]);
    //     }

    //     if ($request->has('witness_id')) {
    //         $witness_validate = $request->validate([
    //             'witness_name' => 'required',
    //             'witness_birth' => 'required',
    //             'witness_address' => 'required',
    //             'witness_gender' => 'required',
    //             'witness_job' => 'required',
    //         ]);

    //         $witness = AccidentWitness::find($request->witness_id);
    //         $witness->update([
    //             'name' => $witness_validate['witness_name'],
    //             'birth' => $witness_validate['witness_birth'],
    //             'address' => $witness_validate['witness_address'],
    //             'gender' => $witness_validate['witness_gender'],
    //             'job' => $witness_validate['witness_job'],
    //         ]);
    //     }


    //     return response()->json([
    //         'message' => 'Success',
    //         'accident' => $accident,
    //         'victim_employee' => $victim_employee,
    //         'victim_non_employee' => $victim_non_employee,
    //         'witness' => $witness,

    //     ], 200);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Accident $accident)
    // {
    //     $accident->delete();
    //     return response()->json([
    //         'message' => 'Success',

    //     ], 200);
    // }
}
