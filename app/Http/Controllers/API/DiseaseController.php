<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\DiseaseVictimEmployee;
use App\Models\DiseaseVictimNonEmployee;
use App\Models\DiseaseWitness;
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
            'diseases' => Disease::all(),

        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

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

        $diseaseValidate = $request->validate([
            'disease_employee_id' => 'required',
            'disease_time' => 'required',
            'disease_location' => 'required',
            'disease_image' => 'required',

        ]);
        $disease = Disease::create([
            'employee_id' => $diseaseValidate['disease_employee_id'],
            'time' => $diseaseValidate['disease_time'],
            'location' => $diseaseValidate['disease_location'],
            'image' => $diseaseValidate['disease_image'],
        ]);

        if ($request->has('victim_employee')) {
            for ($i = 0; $i < count($request->victim_employee); $i++) {
                $victim = $request->victim_employee[$i];
                // $victim_employee_validate = $victim->validate([
                //     'victim_employee_employee_id' => 'required',
                //     'victim_employee_salary_range' => 'required',
                //     'victim_employee_chronology' => 'required',
                //     'victim_employee_first_aid' => 'required',
                //     'victim_employee_effect' => 'required',
                //     'victim_employee_condition' => 'required',
                // ]);

                $victim_employee_ = DiseaseVictimEmployee::create([
                    'disease_id' => $disease->id,
                    'employee_id' => $victim['victim_employee_id'],
                    'salary_range' => $victim['victim_employee_salary_range'],
                    'chronology' => $victim['victim_employee_chronology'],
                    'first_aid' => $victim['victim_employee_first_aid'],
                    'effect' => $victim['victim_employee_effect'],
                    'condition' => $victim['victim_employee_condition'],
                ]);

                array_push($victim_employee, $victim_employee_);
            }
        }

        if ($request->has('victim_non_employee')) {
            for ($i = 0; $i < count($request->victim_non_employee); $i++) {
                $victim = $request->victim_non_employee[$i];
                // $victim_non_employee_validate = $victim->validate([
                //     'victim_non_employee_name' => 'required',
                //     'victim_non_employee_birth' => 'required',
                //     'victim_non_employee_gender' => 'required',
                //     'victim_non_employee_address' => 'required',
                //     'victim_non_employee_job' => 'required',
                // ]);

                $victim_non_employee_ = DiseaseVictimNonEmployee::create([
                    'disease_id' => $disease->id,
                    'name' => $victim['victim_non_employee_name'],
                    'birth' => $victim['victim_non_employee_birth'],
                    'gender' => $victim['victim_non_employee_gender'],
                    'address' => $victim['victim_non_employee_address'],
                    'job' => $victim['victim_non_employee_job'],
                ]);

                array_push($victim_non_employee, $victim_non_employee_);
            }
        }

        if ($request->has('witness')) {
            for ($i = 0; $i < count($request->witness); $i++) {
                $this_witness = $request->witness[$i];
                // $witness_validate = $this_witness->validate([
                //     'witness_name' => 'required',
                //     'witness_birth' => 'required',
                //     'witness_address' => 'required',
                //     'witness_gender' => 'required',
                //     'witness_job' => 'required',
                // ]);

                $witness_ = DiseaseWitness::create([
                    'disease_id' => $disease->id,
                    'name' => $this_witness['witness_name'],
                    'birth' => $this_witness['witness_birth'],
                    'address' => $this_witness['witness_address'],
                    'gender' => $this_witness['witness_gender'],
                    'job' => $this_witness['witness_job'],
                ]);
                if (array_key_exists("witness_nik", $this_witness)){
                    $witness_->update([
                        'nik' => $this_witness['witness_nik'],
                    ]);
                }

                array_push($witness, $witness_);
            }
        }

        return response()->json([
            'message' => 'Success',
            'disease' => $disease,
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
    public function show(Disease $disease)
    {
        return response()->json([
            'message' => 'Success',
            'disease' => $disease,
            'victim_employee' => DiseaseVictimEmployee::where('disease_id', $disease->id)->get(),
            'victim_non_employee' => DiseaseVictimNonEmployee::where('disease_id', $disease->id)->get(),
            'witness' => DiseaseWitness::where('disease_id', $disease->id)->get(),

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Disease $disease)
    // {

    // }

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
    // public function destroy(Disease $disease)
    // {
    //     $disease->delete();
    //     return response()->json([
    //         'message' => 'Success',

    //     ], 200);
    // }
}
