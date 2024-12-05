<?php

namespace Database\Seeders;

use App\Models\DegreeProgram;
use App\Models\University;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Data for Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@uniselector.com',
            'password' => Hash::make('uniselector7'),
            'email_verified_at' => now(),
            'role'=>'admin'
        ]);

        // Data for dummy university data
        $universities = ['Bahria', 'Air', 'Oxford', 'Nust', 'Cambridge'];
        $programs = ['BS Software Engineering', 'BS Computer Science', 'BS English', 'BS Maths', 'BS Physics', 'BS Chemistry', 'BBA', 'BS Media Studies'];

        for ($i = 0; $i < count($universities); $i++) {
            $university = University::create([
                'user_id' => 1, // default for admin user
                'name' => $universities[$i],
                'email' => strtolower($universities[$i]) . '@example.com',
                'phone' => '123-456-789' . ($i + 1),
                'address' => 'Address for ' . $universities[$i],
                'city' => 'City ' . ($i + 1),
            ]);

            // Shuffle programs for each university
            $shuffledPrograms = $programs;
            shuffle($shuffledPrograms);

            for ($j = 0; $j < count($shuffledPrograms); $j++) {
                DegreeProgram::create([
                    'university_id' => $university->id,
                    'title' => $shuffledPrograms[$j],
                    'last_year_merit' => rand(500, 1100),
                    'fee' => rand(10000, 150000),
                ]);
            }
        }

    }
}
