<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Teacher;

Route::get('/', function () {
    return view('welcome');
});

// ----------------------
// Student Routes
// ----------------------

// Get all students
Route::get('/students', function () {
    $studentModel = new Student();
    return response()->json($studentModel->getAllStudents());
});

// Get a student by ID
Route::get('/students/{id}', function ($id) {
    $studentModel = new Student();
    $student = $studentModel->getStudentById($id);

    if ($student) {
        return response()->json($student);
    } else {
        return response()->json(['error' => 'Student not found'], 404);
    }
});

// Create a new student
Route::post('/students', function (Request $request) {
    $data = $request->all();

    $validator = Validator::make($data, [
        'name' => 'required|string|max:255',
        'grade' => 'required|string|in:A,B,C,D,F',
        'department' => 'required|string|max:100',
        'email' => 'required|email|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $studentModel = new Student();
    $student = $studentModel->createStudent($data);

    return response()->json(['message' => 'Student created successfully', 'data' => $student], 201);
});

// Update a student partially
Route::patch('/students/{id}', function ($id, Request $request) {
    $data = $request->all();

    $validator = Validator::make($data, [
        'name' => 'required|string|max:255',
        'grade' => 'required|string|in:A,B,C,D,F',
        'department' => 'required|string|max:100',
        'email' => 'required|email|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $studentModel = new Student();
    $updatedStudent = $studentModel->updateStudent($id, $data);

    if (!$updatedStudent) {
        return response()->json(['error' => 'Student not found'], 404);
    }

    return response()->json(['message' => 'Student updated successfully', 'data' => $updatedStudent], 200);
});

// Delete a student
Route::delete('/students/{id}', function ($id) {
    $studentModel = new Student();
    $deleted = $studentModel->deleteStudent($id);

    if (!$deleted) {
        return response()->json(['error' => 'Student not found'], 404);
    }

    return response()->json(['message' => 'Student deleted successfully'], 200);
});

// Get all teachers
Route::get('/teachers', function () {
    $teacherModel = new Teacher();
    return response()->json($teacherModel->getAllTeachers());
});

// Get a teacher by ID
Route::get('/teachers/{id}', function ($id) {
    $teacherModel = new Teacher();
    $teacher = $teacherModel->getTeacherById($id);

    if ($teacher) {
        return response()->json($teacher);
    } else {
        return response()->json(['error' => 'Teacher not found'], 404);
    }
});

// Create a new teacher
Route::post('/teachers', function (Request $request) {
    $data = $request->all();

    $validator = Validator::make($data, [
        'name' => 'sometimes|required|string|max:255',
        'faculty' => 'sometimes|required|string|max:100',
        'course' => 'sometimes|required|string|max:100',
        'email' => 'sometimes|required|email|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $teacherModel = new Teacher();
    $teacher = $teacherModel->createTeacher($data);

    return response()->json(['message' => 'Teacher created successfully', 'data' => $teacher], 201);
});

// Update a teacher partially
Route::patch('/teachers/{id}', function ($id, Request $request) {
    $data = $request->all();

    $validator = Validator::make($data, [
        'name' => 'sometimes|required|string|max:255',
        'faculty' => 'sometimes|required|string|max:100',
        'course' => 'sometimes|required|string|max:100',
        'email' => 'sometimes|required|email|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $teacherModel = new Teacher();
    $updatedTeacher = $teacherModel->updateTeacher($id, $data);

    if (!$updatedTeacher) {
        return response()->json(['error' => 'Teacher not found'], 404);
    }

    return response()->json(['message' => 'Teacher updated successfully', 'data' => $updatedTeacher], 200);
});

// Delete a teacher
Route::delete('/teachers/{id}', function ($id) {
    $teacherModel = new Teacher();
    $deleted = $teacherModel->deleteTeacher($id);

    if (!$deleted) {
        return response()->json(['error' => 'Teacher not found'], 404);
    }

    return response()->json(['message' => 'Teacher deleted successfully'], 200);
});
