<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Student
{
    protected $students = [];

    public function __construct()
    {
        $this->students = [
            ['id' => 1, 'name' => 'Sok Sochetra', 'grade'=> 'A', 'department'=>'ITE','email' => "soksochetra@ite.edu.kh"],
            ['id' => 2, 'name' => 'Kndrick Lamar', 'grade'=> 'A', 'department'=>'ITE','email' => "kendricklamar@ite.edu.kh"],
            ['id' => 3, 'name' => 'Drake', 'grade'=> 'A', 'department'=>'ITE','email' => "drake@ite.edu.kh"],
        ];
    }

    public function getAllStudents()
    {
        return $this->students;
    }

    public function getStudentById($id)
    {
        foreach ($this->students as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return null;
    }

    public function createStudent($data)
    {
        $data['id'] = count($this->students) + 1;
        $this->students[] = $data;
        return $data;
    }

    public function updateStudent($id, $data)
    {
        foreach ($this->students as &$student) {
            if ($student['id'] == $id) {
                $student = array_merge($student, $data);
                return $student;
            }
        }
        return null;
    }

    public function deleteStudent($id)
    {
        foreach ($this->students as $key => $student) {
            if ($student['id'] == $id) {
                unset($this->students[$key]);
                return true;
            }
        }
        return false;
    }
}