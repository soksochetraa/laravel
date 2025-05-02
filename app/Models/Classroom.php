<?php

namespace App\Models;

class Classroom
{
    private static $students = [
        ['id' => 1, 'name' => 'Monkey D. Luffy', 'age' => 19, 'grade' => 'A+'],
        ['id' => 2, 'name' => 'Roronoa Zoro', 'age' => 21, 'grade' => 'A'],
        ['id' => 3, 'name' => 'Nami', 'age' => 19, 'grade' => 'B+'],
        ['id' => 4, 'name' => 'Sanji', 'age' => 22, 'grade' => 'A-'],
        ['id' => 5, 'name' => 'Tony Tony Chopper', 'age' => 15, 'grade' => 'A+']
    ];

    private static $teachers = [
        ['id' => 1, 'name' => 'Nico Robin', 'subject' => 'MATH'],
        ['id' => 2, 'name' => 'Franky', 'subject' => 'Physics'],
        ['id' => 3, 'name' => 'Brook', 'subject' => 'English'],
        ['id' => 4, 'name' => 'Jinbe', 'subject' => 'History'],
        ['id' => 5, 'name' => 'Usopp', 'subject' => 'Biology']
    ];

    public static function getStudents()
    {
        return self::$students;
    }

    public static function getStudent($id)
    {
        return collect(self::$students)->firstWhere('id', $id);
    }

    public static function addStudent($data)
    {
        if (collect(self::$students)->contains('id', $data['id'])) return false;
        self::$students[] = $data;
        return $data;
    }

    public static function deleteStudent($id)
    {
        self::$students = array_values(array_filter(self::$students, fn($s) => $s['id'] != $id));
    }

    public static function updateStudent($id, $data)
    {
        foreach (self::$students as &$student) {
            if ($student['id'] == $id) {
                $student = array_merge($student, $data);
                return $student;
            }
        }
        return null;
    }

    public static function getTeachers()
    {
        return self::$teachers;
    }

    public static function getTeacher($id)
    {
        return collect(self::$teachers)->firstWhere('id', $id);
    }

    public static function addTeacher($data)
    {
        if (collect(self::$teachers)->contains('id', $data['id'])) return false;
        self::$teachers[] = $data;
        return $data;
    }

    public static function deleteTeacher($id)
    {
        self::$teachers = array_values(array_filter(self::$teachers, fn($t) => $t['id'] != $id));
    }

    public static function updateTeacher($id, $data)
    {
        foreach (self::$teachers as &$teacher) {
            if ($teacher['id'] == $id) {
                $teacher = array_merge($teacher, $data);
                return $teacher;
            }
        }
        return null;
    }
}
