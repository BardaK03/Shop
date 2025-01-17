<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    public function run()
    {
        DB::table('patients')->insert([
            ['name' => 'John Doe', 'age' => 30, 'gender' => 'Male', 'phone_number' => '1234567890', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jane Smith', 'age' => 25, 'gender' => 'Female', 'phone_number' => '0987654321', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mark Johnson', 'age' => 40, 'gender' => 'Male', 'phone_number' => '1112223333', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

