<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Accident;
use App\Models\AccidentDetail;
use App\Models\AccidentVictimEmployee;
use App\Models\AccidentVictimNonEmployee;
use App\Models\AccidentWitnessEmployee;
use App\Models\AccidentWitnessNonEmployee;
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
            'accidents' => Accident::with(['employee', 'accident_victim_employee', 'accident_victim_non_employee', 'accident_witness_employee', 'accident_witness_non_employee'])->get(),

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
        $accidentValidate = $request->validate([
            'employee_id' => 'required',
            'time' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);

        //store image
        $folderPath = "storage/accidentImage/";

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;

        file_put_contents($file, $image_base64);

        $validatedData['image'] = $file;

        $accident = Accident::create([
            'employee_id' => $accidentValidate['employee_id'],
            'time' => $accidentValidate['time'],
            'location' => $accidentValidate['location'],
            'image' => $accidentValidate['image'],
        ]);

        // Victim Employee
        if ($request->has('victim_employee')) {
            for ($i = 0; $i < count($request->victim_employee); $i++) {
                $victim = $request->victim_employee[$i];

                AccidentVictimEmployee::create([
                    'accident_id' => $accident->id,
                    'employee_id' => $victim['employee_id'],
                    'salary_range' => $victim['salary_range'] ?? NULL,
                    'chronology' => $victim['chronology'] ?? NULL,
                    'first_aid' => $victim['first_aid'] ?? NULL,
                    'effect' => $victim['effect'] ?? NULL,
                    'condition' => $victim['condition'] ?? NULL,
                ]);
            }
        }

        // Victim Non Employee
        if ($request->has('victim_non_employee')) {
            for ($i = 0; $i < count($request->victim_non_employee); $i++) {
                $victim = $request->victim_non_employee[$i];

                AccidentVictimNonEmployee::create([
                    'accident_id' => $accident->id,
                    'name' => $victim['name'] ?? NULL,
                    'birth' => $victim['birth'] ?? NULL,
                    'gender' => $victim['gender'] ?? NULL,
                    'address' => $victim['address'] ?? NULL,
                    'job' => $victim['job'] ?? NULL,
                ]);
            }
        }

        // Witness Employee
        if ($request->has('witness_employee')) {
            for ($i = 0; $i < count($request->witness_employee); $i++) {
                $witness = $request->witness_employee[$i];

                AccidentWitnessEmployee::create([
                    'accident_id' => $accident->id,
                    'employee_id' => $witness['employee_id']
                ]);
            }
        }

        // Witness Non Employee
        if ($request->has('witness_non_employee')) {
            for ($i = 0; $i < count($request->witness_non_employee); $i++) {
                $witness = $request->witness_non_employee[$i];

                AccidentWitnessNonEmployee::create([
                    'accident_id' => $accident->id,
                    'name' => $witness['name'] ?? NULL,
                    'birth' => $witness['birth'] ?? NULL,
                    'nik' => $witness['nik'] ?? NULL,
                    'address' => $witness['address'] ?? NULL,
                    'gender' => $witness['gender'] ?? NULL,
                    'job' => $witness['job'] ?? NULL,
                ]);
            }
        }

        // Detail PAK
        if ($request->has('detail')) {
            for ($i = 0; $i < count($request->detail); $i++) {
                $det = $request->detail[$i];

                AccidentDetail::create([
                    'accident_id' => $accident->id,
                    'chronology' => $det['chronology'] ?? NULL,
                    'faskes' => $det['faskes'] ?? NULL,
                    'effect' => $det['effect'] ?? NULL,
                    'condition' => $det['condition'] ?? NULL,
                ]);
            }
        }

        return response()->json([
            'message' => 'Success',
            'accident' => Accident::with(['employee', 'accident_victim_employee', 'accident_victim_non_employee', 'accident_witness_employee', 'accident_witness_non_employee'])->find($accident->id),

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
            'accidents' => Accident::with(['employee', 'accident_victim_employee', 'accident_victim_non_employee', 'accident_witness_employee', 'accident_witness_non_employee'])->find($accident->id),

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
    public function destroy(Accident $accident)
    {
        $accident->delete();
        return response()->json([
            'message' => 'Success',

        ], 200);
    }
}
