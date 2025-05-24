<?php

namespace App\Models;

class Teacher
{
    protected $teachers = [];

    public function __construct()
    {
        $this->teachers = [
            ['id' => 1, 'name' => 'Sok Sochetra', 'faculty'=>'Engineering', 'course'=>"MATH",'email' => "soksochetra@ite.edu.kh"],
            ['id' => 2, 'name' => 'Kendrick Lamar', 'faculty'=>'Science', 'course'=>"APL",'email' => "kendricklamar@ite.edu.kh"],
            ['id' => 3, 'name' => 'Drake', 'faculty'=>'IFL', 'course'=>"DSA",'email' => "drake@ite.edu.kh"],
        ];
    }

    public function getAllTeachers()
    {
        return $this->teachers;
    }

    public function getTeacherById($id)
    {
        foreach ($this->teachers as $teacher) {
            if ($teacher['id'] == $id) {
                return $teacher;
            }
        }
        return null;
    }

    public function createTeacher($data)
    {
        $data['id'] = count($this->teachers) + 1;
        $this->teachers[] = $data;
        return $data;
    }

    public function updateTeacher($id, $data)
    {
        foreach ($this->teachers as &$teacher) {
            if ($teacher['id'] == $id) {
                $teacher = array_merge($teacher, $data);
                return $teacher;
            }
        }
        return null;
    }

    public function deleteTeacher($id)
    {
        foreach ($this->teachers as $key => $teacher) {
            if ($teacher['id'] == $id) {
                unset($this->teachers[$key]);
                return true;
            }
        }
        return false;
    }
}
