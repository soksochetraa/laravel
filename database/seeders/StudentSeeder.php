<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [];

        for ($i = 1; $i <= 50; $i++) {
            $students[] = [
                'name' => 'Student ' . $i,
                'email' => 'student' . $i . '@ite.edu.kh',
                'grade' => ['A', 'B', 'C', 'D'][array_rand(['A', 'B', 'C', 'D'])],
                'department' => ['ITE', 'Science', 'Business', 'Engineering'][array_rand(['ITE', 'Science', 'Business', 'Engineering'])],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('students')->insert($students);
    }
}
