<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Briefing;
use App\Models\Employee;
use App\Models\BriefingPresence;

class BriefingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            Briefing::factory(1)->create();

            for($j=1; $j<=mt_rand(1, Employee::all()->count()); $j++){
                BriefingPresence::create([
                    'briefing_id' => $i,
                    'employee_id' => $j,
                ]);
            }
        }
    }
}
