<?php

namespace Database\Seeders;

use App\Models\Accident;
use App\Models\AccidentDetail;
use App\Models\AccidentVictimEmployee;
use App\Models\AccidentVictimNonEmployee;
use App\Models\AccidentWitnessEmployee;
use App\Models\AccidentWitnessNonEmployee;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class AccidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=20; $i++){
            Accident::factory(1)->create();

            // Victim Employee
            AccidentVictimEmployee::factory(mt_rand(1, 5))->create([
                'accident_id' => $i,

            ]);

            // Victim Non Employee
            AccidentVictimNonEmployee::factory(mt_rand(1, 5))->create([
                'accident_id' => $i,

            ]);

            // Witness Employee
            AccidentWitnessEmployee::factory(1)->create([
                'accident_id' => $i,
                'employee_id' => mt_rand(1, Employee::all()->count())
            ]);
            
            // Witness Non Employee
            AccidentWitnessNonEmployee::factory(1)->create([
                'accident_id' => $i,

            ]);
            AccidentDetail::factory(1)->create([
                'accident_id' => $i
            ]);
        }
    }
}
