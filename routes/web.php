<?php

use Illuminate\Support\Facades\Route;
use App\Models\Classroom;

// Students
Route::get('/students', function () {
    $id = request('id');
    if ($id) {
        $student = Classroom::getStudent($id);
        return $student ? response()->json($student) : response()->json(['error' => 'Student not found'], 404);
    }
    return response()->json(Classroom::getStudents());
});

Route::post('/students', function () {
    $data = request()->all();
    $created = Classroom::addStudent($data);
    return $created ? response()->json(['message' => 'Student added', 'data' => $created])
                    : response()->json(['error' => 'ID already exists'], 409);
});

Route::delete('/students/{id}', function ($id) {
    Classroom::deleteStudent($id);
    return response()->json(['message' => 'Student deleted']);
});

Route::patch('/students/{id}', function ($id) {
    $updated = Classroom::updateStudent($id, request()->all());
    return $updated ? response()->json(['message' => 'Student updated', 'data' => $updated])
                    : response()->json(['error' => 'Student not found'], 404);
});

// Teachers
Route::get('/teachers', function () {
    $id = request('id');
    if ($id) {
        $teacher = Classroom::getTeacher($id);
        return $teacher ? response()->json($teacher) : response()->json(['error' => 'Teacher not found'], 404);
    }
    return response()->json(Classroom::getTeachers());
});

Route::post('/teachers', function () {
    $data = request()->all();
    $created = Classroom::addTeacher($data);
    return $created ? response()->json(['message' => 'Teacher added', 'data' => $created])
                    : response()->json(['error' => 'ID already exists'], 409);
});

Route::delete('/teachers/{id}', function ($id) {
    Classroom::deleteTeacher($id);
    return response()->json(['message' => 'Teacher deleted']);
});

Route::patch('/teachers/{id}', function ($id) {
    $updated = Classroom::updateTeacher($id, request()->all());
    return $updated ? response()->json(['message' => 'Teacher updated', 'data' => $updated])
                    : response()->json(['error' => 'Teacher not found'], 404);
});
