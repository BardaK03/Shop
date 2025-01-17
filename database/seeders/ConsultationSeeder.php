<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultationSeeder extends Seeder
{
    public function run()
    {
        DB::table('consultations')->insert([
            [
                'patient_id' => 1, // Patient ID should exist in the patients table
                'doctor_id' => 1,  // Doctor ID should exist in the doctors table
                'date' => '2024-12-27',
                'notes' => 'Consultation notes for patient 1.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'patient_id' => 2,
                'doctor_id' => 2,
                'date' => '2024-12-28',
                'notes' => 'Consultation notes for patient 2.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'patient_id' => 3,
                'doctor_id' => 3,
                'date' => '2024-12-29',
                'notes' => 'Consultation notes for patient 3.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
