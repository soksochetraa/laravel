<?php

use Illuminate\Support\Facades\Route;

$students = [
    ['id' => 1, 'name' => 'Monkey D. Luffy', 'age' => 19, 'grade' => 'A+'],
    ['id' => 2, 'name' => 'Roronoa Zoro',     'age' => 21, 'grade' => 'A'],
    ['id' => 3, 'name' => 'Nami',              'age' => 19, 'grade' => 'B+'],
    ['id' => 4, 'name' => 'Sanji',             'age' => 22, 'grade' => 'A-'],
    ['id' => 5, 'name' => 'Tony Tony Chopper', 'age' => 15, 'grade' => 'A+']
];

$teachers = [
    ['id' => 1, 'name' => 'Nico Robin', 'subject' => 'MATH'],
    ['id' => 2, 'name' => 'Franky',     'subject' => 'Physics'],
    ['id' => 3, 'name' => 'Brook',      'subject' => 'English'],
    ['id' => 4, 'name' => 'Jinbe',      'subject' => 'History'],
    ['id' => 5, 'name' => 'Usopp',      'subject' => 'Biology']
];


// Get ALl Students
Route::get('/students', function () use (&$students) {
    $id = request('id');
    if ($id) {
        foreach ($students as $student) {
            if ($student['id'] == $id) {
                return response()->json($student);
            }
        }
        return response()->json(['error' => 'Student not found'], 404);
    }
    return response()->json($students);
});

// Create New Student
Route::post('/students', function () use (&$students) {
    $data = request()->all();
    foreach ($students as $student) {
        if ($student['id'] == $data['id']) {
            return response()->json(['error' => 'ID already exists'], 409);
        }
    }
    $students[] = $data;
    return response()->json(['message' => 'Student added', 'data' => $data]);
});


// Delete Student by id
Route::delete('/students/{id}', function ($id) use (&$students) {
    $students = array_values(array_filter($students, fn($s) => $s['id'] != $id));
    return response()->json(['message' => 'Student deleted']);
});


// Update or Patch Student by id
Route::patch('/students/{id}', function ($id) use (&$students) {
    foreach ($students as &$student) {
        if ($student['id'] == $id) {
            $student = array_merge($student, request()->all());
            return response()->json(['message' => 'Student updated', 'data' => $student]);
        }
    }
    return response()->json(['error' => 'Student not found'], 404);
});

// Get All Teachers
Route::get('/teachers', function () use (&$teachers) {
    $id = request('id');
    if ($id) {
        foreach ($teachers as $teacher) {
            if ($teacher['id'] == $id) {
                return response()->json($teacher);
            }
        }
        return response()->json(['error' => 'Teacher not found'], 404);
    }
    return response()->json($teachers);
});

// Create New Teacher
Route::post('/teachers', function () use (&$teachers) {
    $data = request()->all();
    foreach ($teachers as $teacher) {
        if ($teacher['id'] == $data['id']) {
            return response()->json(['error' => 'ID already exists'], 409);
        }
    }
    $teachers[] = $data;
    return response()->json(['message' => 'Teacher added', 'data' => $data]);
});

// Delete Teacher by id
Route::delete('/teachers/{id}', function ($id) use (&$teachers) {
    $teachers = array_values(array_filter($teachers, fn($t) => $t['id'] != $id));
    return response()->json(['message' => 'Teacher deleted']);
});

// Update or Patch Teacher by id
Route::patch('/teachers/{id}', function ($id) use (&$teachers) {
    foreach ($teachers as &$teacher) {
        if ($teacher['id'] == $id) {
            $teacher = array_merge($teacher, request()->all());
            return response()->json(['message' => 'Teacher updated', 'data' => $teacher]);
        }
    }
    return response()->json(['error' => 'Teacher not found'], 404);
});
