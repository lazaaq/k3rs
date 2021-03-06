<?php

namespace Database\Seeders;

use App\Models\Disease;
use App\Models\DiseaseVictimEmployee;
use App\Models\DiseaseVictimNonEmployee;
use App\Models\DiseaseWitness;
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
            
            // Witness
            DiseaseWitness::factory(mt_rand(1,2))->create([
                'disease_id' => $i,

            ]);
        }
    }
}
