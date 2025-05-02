<?php

use Illuminate\Support\Facades\Route;
use App\Models\Classroom;

// Get all students
Route::get('/students', function () {
    return response()->json(Classroom::getStudents());
});

// Add a new student
Route::post('/students', function () {
    $data = request()->all();
    $created = Classroom::addStudent($data);
    return $created ? response()->json(['message' => 'Student added', 'data' => $created])
                    : response()->json(['error' => 'ID already exists'], 409);
});

// Delete a student by ID
Route::delete('/students/{id}', function ($id) {
    Classroom::deleteStudent($id);
    return response()->json(['message' => 'Student deleted']);
});

// Update or patch a student by ID
Route::patch('/students/{id}', function ($id) {
    $updated = Classroom::updateStudent($id, request()->all());
    return $updated ? response()->json(['message' => 'Student updated', 'data' => $updated])
                    : response()->json(['error' => 'Student not found'], 404);
});

// Get all teachers
Route::get('/teachers', function () {
    return response()->json(Classroom::getTeachers());
});

// Add a new teacher
Route::post('/teachers', function () {
    $data = request()->all();
    $created = Classroom::addTeacher($data);
    return $created ? response()->json(['message' => 'Teacher added', 'data' => $created])
                    : response()->json(['error' => 'ID already exists'], 409);
});

// Delete a teacher by ID
Route::delete('/teachers/{id}', function ($id) {
    Classroom::deleteTeacher($id);
    return response()->json(['message' => 'Teacher deleted']);
});

// Update or patch a teacher by ID
Route::patch('/teachers/{id}', function ($id) {
    $updated = Classroom::updateTeacher($id, request()->all());
    return $updated ? response()->json(['message' => 'Teacher updated', 'data' => $updated])
                    : response()->json(['error' => 'Teacher not found'], 404);
});
