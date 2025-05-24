<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Student
{
    public function getAllStudents()
    {
        return DB::table('students')->get();
    }

    public function getStudentById($id)
    {
        return DB::table('students')->where('id', $id)->first();
    }

    public function createStudent($data)
    {
        $id = DB::table('students')->insertGetId([
            'name' => $data['name'],
            'grade' => $data['grade'],
            'department' => $data['department'],
            'email' => $data['email'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $this->getStudentById($id);
    }

    public function updateStudent($id, $data)
    {
        $updated = DB::table('students')->where('id', $id)->update(array_merge(
            $data,
            ['updated_at' => now()]
        ));

        if ($updated) {
            return $this->getStudentById($id);
        }
        return null;
    }

    public function deleteStudent($id)
    {
        return DB::table('students')->where('id', $id)->delete() > 0;
    }
}
