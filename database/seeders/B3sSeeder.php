<?php

namespace Database\Seeders;

use App\Models\B3s;
use App\Models\B3sAction;
use App\Models\B3sDetail;
use Illuminate\Database\Seeder;

class B3sSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){

            $pcra = B3s::factory(1)->create();
            
            B3sAction::factory(1)->create([
                'b3s_id' => $i,
            ]);
            
            B3sDetail::factory(1)->create([
                'b3s_id' => $i,
            ]);

        }
    }
}
