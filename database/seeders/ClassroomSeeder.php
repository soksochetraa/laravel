<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 25; $i++) {
            DB::table('students')->insert([
                'name' => 'Student ' . $i,
                'grade' => 'A',
                'email' => 'student.' . $i . '.2822@rupp.edu.kh',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        for ($i = 1; $i <= 15; $i++) {
            DB::table('teachers')->insert([
                'name' => 'Teacher ' . $i,
                'subject' => 'Subject ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
