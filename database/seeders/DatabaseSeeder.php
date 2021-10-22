<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Regulasi;
use App\Models\Apar;
use App\Models\AparHistory;
use App\Models\Manager;
use App\Models\News;
use App\Models\Salary;
use App\Models\UserApi;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        // Regulasi::factory(20)->create();
        Apar::factory(20)->create();
        News::factory(20)->create();
        Employee::factory(20)->create();
        Manager::factory(20)->create();
        Salary::factory(15)->create();

        $this->call(BriefingSeeder::class);
        $this->call(AccidentSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(AparHistorySeeder::class);
        $this->call(PcraSeeder::class);
        $this->call(B3sSeeder::class);

        Employee::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'admin',
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        Regulasi::create([
            'title' => 'UU No 1 tahun 1970',
            'description' => 'tentang keselamatan kerja',
            'file' => 'a'
        ]);
        Regulasi::create([
            'title' => 'Undang-Undang Nomor 13 Tahun 2003',
            'description' => 'tentang Ketenagakerjaan',
            'file' => 'a'
        ]);
        Regulasi::create([
            'title' => 'Permenkes No 66 tahun 2016',
            'description' => 'tentang K3RS',
            'file' => 'a'
        ]);
        Regulasi::create([
            'title' => 'PP Nomor 88 tahun 2019',
            'description' => 'tentang Kesehatan Kerja',
            'file' => 'a'
        ]);
        Regulasi::create([
            'title' => 'Kepmenkes  No 432/MENKES/SK/IV/ tahun 2007',
            'description' => 'tentang Manajemen K3RS',
            'file' => 'a'
        ]);
    }
}
