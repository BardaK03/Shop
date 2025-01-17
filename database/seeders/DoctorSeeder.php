<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        DB::table('doctors')->insert([
            ['name' => 'Dr. Alice', 'specialty' => 'Cardiologist', 'email' => 'alice@clinic.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dr. Bob', 'specialty' => 'Orthopedic', 'email' => 'bob@clinic.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dr. Charlie', 'specialty' => 'Neurologist', 'email' => 'charlie@clinic.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
