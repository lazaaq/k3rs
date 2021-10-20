<?php

namespace Database\Seeders;

use App\Models\Disease;
use App\Models\DiseaseList;
use App\Models\DiseaseVictimEmployee;
use App\Models\DiseaseVictimNonEmployee;
use App\Models\DiseaseWitnessEmployee;
use App\Models\DiseaseWitnessNonEmployee;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=20; $i++){
            Disease::factory(1)->create();

            // Victim Employee
            DiseaseVictimEmployee::factory(mt_rand(1,5))->create([
                'disease_id' => $i,

            ]);

            // Victim Non Employee
            DiseaseVictimNonEmployee::factory(mt_rand(1,5))->create([
                'disease_id' => $i,

            ]);
            
            // Witness Employee
            DiseaseWitnessEmployee::factory(1)->create([
                'disease_id' => $i,
                'employee_id' => mt_rand(1, Employee::all()->count())
            ]);

            // Witness Non Employee
            DiseaseWitnessNonEmployee::factory(1)->create([
                'disease_id' => $i,

            ]);
        }

        DiseaseList::create([
            'disease_name' => 'Patah Tulang'
        ]);
        DiseaseList::create([
            'disease_name' => 'Covid 19'
        ]);
        DiseaseList::create([
            'disease_name' => 'Serangan Jantung'
        ]);
    }
}
