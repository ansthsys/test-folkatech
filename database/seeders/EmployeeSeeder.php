<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) { // Seed company size
            for ($j = 0; $j < 30; $j++) { // Total employee per company 
                Employee::factory()->create([
                    'company_id' => $i + 1,
                ]);
            }
        }
    }
}
