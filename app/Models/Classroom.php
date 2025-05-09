<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Classroom
{
    public static function getStudents()
    {
        return DB::table('students')->get();
    }

    public static function getStudentById($id)
    {
        return DB::table('students')->where('id', $id)->first();
    }

    public static function addStudent($data)
    {
        return DB::table('students')->insertGetId($data);
    }

    public static function deleteStudent($id)
    {
        return DB::table('students')->where('id', $id)->delete();
    }

    public static function updateStudent($id, $data)
    {
        return DB::table('students')->where('id', $id)->update($data);
    }

    public static function getTeachers()
    {
        return DB::table('teachers')->get();
    }

    public static function getTeacherById($id)
    {
        return DB::table('teachers')->where('id', $id)->first();
    }

    public static function addTeacher($data)
    {
        return DB::table('teachers')->insertGetId($data);
    }

    public static function deleteTeacher($id)
    {
        return DB::table('teachers')->where('id', $id)->delete();
    }

    public static function updateTeacher($id, $data)
    {
        return DB::table('teachers')->where('id', $id)->update($data);
    }
}
