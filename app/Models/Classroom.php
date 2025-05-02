<?php

namespace App\Models;

class Classroom
{
    private static $data = [
        'students' => [
            ['id' => 1, 'name' => 'Monkey D. Luffy', 'age' => 19, 'grade' => 'A+'],
            ['id' => 2, 'name' => 'Roronoa Zoro', 'age' => 21, 'grade' => 'A'],
            ['id' => 3, 'name' => 'Nami', 'age' => 19, 'grade' => 'B+'],
            ['id' => 4, 'name' => 'Sanji', 'age' => 22, 'grade' => 'A-'],
            ['id' => 5, 'name' => 'Tony Tony Chopper', 'age' => 15, 'grade' => 'A+']
        ],
        'teachers' => [
            ['id' => 1, 'name' => 'Gol D. Roger', 'subject' => 'History'],
            ['id' => 2, 'name' => 'Marco', 'subject' => 'Medicine'],
            ['id' => 3, 'name' => 'Nico Robin', 'subject' => 'Archaeology'],
            ['id' => 4, 'name' => 'Franky', 'subject' => 'Engineering'],
            ['id' => 5, 'name' => 'Brook', 'subject' => 'Music']
        ]
    ];

    // Get all students
    public static function getStudents()
    {
        return self::$data['students'];
    }

    // Create a new student
    public static function addStudent($data)
    {
        if (collect(self::$data['students'])->contains('id', $data['id'])) return false;
        self::$data['students'][] = $data;
        return $data;
    }

    // Delete a student by ID
    public static function deleteStudent($id)
    {
        self::$data['students'] = array_values(array_filter(self::$data['students'], fn($s) => $s['id'] != $id));
    }

    // Update or Patch a student by ID
    public static function updateStudent($id, $data)
    {
        foreach (self::$data['students'] as $i => $student) {
            if ($student['id'] == $id) {
                self::$data['students'][$i] = array_merge($student, $data);
                return self::$data['students'][$i];
            }
        }
        return null;
    }

    // Get all teachers
    public static function getTeachers()
    {
        return self::$data['teachers'];
    }

    // Create a new teacher
    public static function addTeacher($data)
    {
        if (collect(self::$data['teachers'])->contains('id', $data['id'])) return false;
        self::$data['teachers'][] = $data;
        return $data;
    }

    // Delete a teacher by ID
    public static function deleteTeacher($id)
    {
        self::$data['teachers'] = array_values(array_filter(self::$data['teachers'], fn($t) => $t['id'] != $id));
    }

    // Update or Patch a teacher by ID
    public static function updateTeacher($id, $data)
    {
        foreach (self::$data['teachers'] as $i => $teacher) {
            if ($teacher['id'] == $id) {
                self::$data['teachers'][$i] = array_merge($teacher, $data);
                return self::$data['teachers'][$i];
            }
        }
        return null;
    }
}
