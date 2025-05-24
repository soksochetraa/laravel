<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Teacher
{
    public function getAllTeachers()
    {
        return DB::table('teachers')->get();
    }

    public function getTeacherById($id)
    {
        return DB::table('teachers')->where('id', $id)->first();
    }

    public function createTeacher($data)
    {
        $id = DB::table('teachers')->insertGetId([
            'name' => $data['name'],
            'faculty' => $data['faculty'],
            'course' => $data['course'],
            'email' => $data['email'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $this->getTeacherById($id);
    }

    public function updateTeacher($id, $data)
    {
        $updated = DB::table('teachers')->where('id', $id)->update(array_merge(
            $data,
            ['updated_at' => now()]
        ));

        if ($updated) {
            return $this->getTeacherById($id);
        }
        return null;
    }

    public function deleteTeacher($id)
    {
        return DB::table('teachers')->where('id', $id)->delete() > 0;
    }
}
