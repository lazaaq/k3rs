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
        Regulasi::factory(20)->create();
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

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        UserApi::create([
            'email' => 'admin@gmail.com',
            'password' => 'admin'
        ]);

        Employee::create([
            'manager_id' => '1',
            'salary_id' => '1',
            'name' => 'Lana Saiful Aqil',
            'email' => 'lanasaiful411@gmail.com',
            'password' => Hash::make('admin'),
            'address' => 'address',
            'birth' => '2002-11-04',
            'gender' => 'L'
        ]);

    }
}
