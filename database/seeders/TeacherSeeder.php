<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [];

        $faculties = ['Science', 'Arts', 'Business', 'Engineering'];
        $courses = ['APL', 'Math', 'Physics', 'Economics', 'Programming'];

        for ($i = 1; $i <= 10; $i++) {
            $teachers[] = [
                'name' => 'Teacher ' . $i,
                'email' => 'teacher' . $i . '@ite.edu.kh',
                'faculty' => $faculties[array_rand($faculties)],
                'course' => $courses[array_rand($courses)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('teachers')->insert($teachers);
    }
}
