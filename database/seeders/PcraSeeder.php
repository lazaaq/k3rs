<?php

namespace Database\Seeders;

use App\Models\Pcras;
use App\Models\PcrasAccessArea;
use App\Models\PcrasConstruction;
use App\Models\PcrasDetail;
use App\Models\PcrasDocumentation;
use App\Models\PcrasTraffic;
use Illuminate\Database\Seeder;

class PcraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){

            $pcra = Pcras::factory(1)->create();
            
            PcrasConstruction::factory(1)->create([
                'pcras_id' => $i,
            ]);
            
            PcrasAccessArea::factory(1)->create([
                'pcras_id' => $i,
            ]);

            PcrasTraffic::factory(1)->create([
                'pcras_id' => $i,
            ]);

            PcrasDetail::factory(1)->create([
                'pcras_id' => $i,
            ]);

            PcrasDocumentation::factory(1)->create([
                'pcras_id' => $i,
            ]);

        }
    }
}
