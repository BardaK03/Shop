<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosisSeeder extends Seeder
{
    public function run()
    {
        DB::table('diagnoses')->insert([
            [
                'consultation_id' => 1, // Matches consultation with ID 1
                'name' => 'Hypertension',
                'description' => 'High blood pressure condition.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'consultation_id' => 2,
                'name' => 'Fracture',
                'description' => 'Broken leg bone.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'consultation_id' => 3,
                'name' => 'Migraine',
                'description' => 'Severe headache condition.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


