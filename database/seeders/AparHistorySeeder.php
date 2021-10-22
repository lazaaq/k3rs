<?php

namespace Database\Seeders;

use App\Models\Apar;
use App\Models\AparHistory;
use Illuminate\Database\Seeder;

class AparHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= Apar::all()->count(); $i++){
            AparHistory::factory(3)->create([
                'apar_id' => $i,
                'image' => 'storage\aparImage\default.jpg'
            ]);
            Apar::find($i)->update([
                'last_image' => 'storage\aparImage\default.jpg'
            ]);
        }
    }
}
