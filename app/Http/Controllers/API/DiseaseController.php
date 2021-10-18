<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\DiseaseDetail;
use App\Models\DiseaseVictimEmployee;
use App\Models\DiseaseVictimNonEmployee;
use App\Models\DiseaseWitnessEmployee;
use App\Models\DiseaseWitnessNonEmployee;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class DiseaseController extends Controller
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
            'diseases' => Disease::with(['employee', 'disease_victim_employee', 'disease_victim_non_employee', 'disease_witness_employee', 'disease_witness_non_employee'])->get(),
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
        $diseaseValidate = $request->validate([
            'employee_id' => 'required',
            'time' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);

        //store image
        $folderPath = "storage/diseaseImage/";

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;

        file_put_contents($file, $image_base64);

        $validatedData['image'] = $file;

        $disease = Disease::create([
            'employee_id' => $diseaseValidate['employee_id'],
            'time' => $diseaseValidate['time'],
            'location' => $diseaseValidate['location'],
            'image' => $diseaseValidate['image'],
        ]);

        if ($request->has('victim_employee')) {
            for ($i = 0; $i < count($request->victim_employee); $i++) {
                $victim = $request->victim_employee[$i];

                DiseaseVictimEmployee::create([
                    'disease_id' => $disease->id,
                    'employee_id' => $victim['employee_id'] ?? NULL,
                ]);
            }
        }

        if ($request->has('victim_non_employee')) {
            for ($i = 0; $i < count($request->victim_non_employee); $i++) {
                $victim = $request->victim_non_employee[$i];

                DiseaseVictimNonEmployee::create([
                    'disease_id' => $disease->id,
                    'name' => $victim['name'] ?? NULL,
                    'birth' => $victim['birth'] ?? NULL,
                    'gender' => $victim['gender'] ?? NULL,
                    'address' => $victim['address'] ?? NULL,
                    'job' => $victim['job'] ?? NULL,
                ]);
            }
        }

        if ($request->has('witness_employee')) {
            for ($i = 0; $i < count($request->witness_employee); $i++) {
                $witness = $request->witness_employee[$i];

                DiseaseWitnessEmployee::create([
                    'disease_id' => $disease->id,
                    'employee_id' => $witness['employee_id'],
                ]);
            }
        }

        if ($request->has('witness_non_employee')) {
            for ($i = 0; $i < count($request->witness_non_employee); $i++) {
                $witness = $request->witness_non_employee[$i];

                DiseaseWitnessNonEmployee::create([
                    'disease_id' => $disease->id,
                    'name' => $witness['name'] ?? NULL,
                    'birth' => $witness['birth'] ?? NULL,
                    'nik' => $witness['nik'] ?? NULL,
                    'gender' => $witness['gender'] ?? NULL,
                    'address' => $witness['address'] ?? NULL,
                    'job' => $witness['job'] ?? NULL,
                    'phone' => $witness['phone'] ?? NULL,
                ]);
            }
        }

        if ($request->has('detail')) {
            for ($i = 0; $i < count($request->detail); $i++) {
                $det = $request->detail[$i];

                DiseaseDetail::create([
                    'disease_id' => $disease->id,
                    'chronology' => $det['chronology'] ?? NULL,
                    'faskes' => $det['faskes'] ?? NULL,
                    'cause' => $det['cause'] ?? NULL,
                    'effect' => $det['effect'] ?? NULL
                ]);
            }
        }

        return response()->json([
            'message' => 'Success',
            'diseases' => Disease::with(['employee', 'disease_victim_employee', 'disease_victim_non_employee', 'disease_witness_employee', 'disease_witness_non_employee'])->find($disease->id),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        return response()->json([
            'message' => 'Success',
            'diseases' => Disease::with(['employee', 'disease_victim_employee', 'disease_victim_non_employee', 'disease_witness_employee', 'disease_witness_non_employee'])->find($disease->id),
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Disease $disease)
    // {

    //     $victim_employee = null;
    //     $victim_non_employee = null;
    //     $witness = null;

    //     $diseaseValidate = $request->validate([
    //         'disease_employee_id' => 'required',
    //         'disease_time' => 'required',
    //         'disease_location' => 'required',
    //         'disease_image' => 'required',

    //     ]);
    //     $disease->update([
    //         'employee_id' => $diseaseValidate['disease_employee_id'],
    //         'time' => $diseaseValidate['disease_time'],
    //         'location' => $diseaseValidate['disease_location'],
    //         'image' => $diseaseValidate['disease_image'],

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

    //         $victim_employee = DiseaseVictimEmployee::find($request->victim_employee_id);
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

    //         $victim_non_employee = DiseaseVictimNonEmployee::find($request->victim_non_employee_id);
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

    //         $witness = DiseaseWitness::find($request->witness_id);
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
    //         'disease' => $disease,
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
    public function destroy(Disease $disease)
    {
        $disease->delete();
        return response()->json([
            'message' => 'Success',

        ], 200);
    }
}
