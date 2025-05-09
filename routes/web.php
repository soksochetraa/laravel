<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Classroom;

Route::get('/students', function () {
    return response()->json(Classroom::getStudents());
});

Route::get('/students/{id}', function ($id) {
    $student = Classroom::getStudentById($id);
    return $student
        ? response()->json($student)
        : response()->json(['error' => 'Student not found'], 404);
});

Route::post('/students', function (Request $request) {
    $id = Classroom::addStudent($request->all());
    $student = Classroom::getStudentById($id);
    return response()->json(['message' => 'Student added', 'data' => $student], 201);
});

Route::patch('/students/{id}', function ($id, Request $request) {
    $updated = Classroom::updateStudent($id, $request->all());
    if ($updated) {
        $student = Classroom::getStudentById($id);
        return response()->json(['message' => 'Student updated', 'data' => $student]);
    }
    return response()->json(['error' => 'Student not found'], 404);
});

Route::delete('/students/{id}', function ($id) {
    Classroom::deleteStudent($id);
    return response()->json(['message' => 'Student deleted']);
});

Route::get('/teachers', function () {
    return response()->json(Classroom::getTeachers());
});

Route::get('/teachers/{id}', function ($id) {
    $teacher = Classroom::getTeacherById($id);
    return $teacher
        ? response()->json($teacher)
        : response()->json(['error' => 'Teacher not found'], 404);
});

Route::post('/teachers', function (Request $request) {
    $id = Classroom::addTeacher($request->all());
    $teacher = Classroom::getTeacherById($id);
    return response()->json(['message' => 'Teacher added', 'data' => $teacher], 201);
});

Route::patch('/teachers/{id}', function ($id, Request $request) {
    $updated = Classroom::updateTeacher($id, $request->all());
    if ($updated) {
        $teacher = Classroom::getTeacherById($id);
        return response()->json(['message' => 'Teacher updated', 'data' => $teacher]);
    }
    return response()->json(['error' => 'Teacher not found'], 404);
});

Route::delete('/teachers/{id}', function ($id) {
    Classroom::deleteTeacher($id);
    return response()->json(['message' => 'Teacher deleted']);
});
