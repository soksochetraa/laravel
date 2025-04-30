<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
    $data = [
        'name' => 'John Doe',
        'age' => 20,
        'grade' => 'A'
    ];
    return response()->json($data);
});

Route::post('/students', function () {
    // Get the request data
    $data = request()->all();
    return response()->json([
        'message' => 'Student data received',
        'data' => $data
    ]);
});

Route::get('/teachers', function () {
    $data = [
        'name' => 'Jane Smith',
        'subject' => 'Mathematics',
        'experience' => 5
    ];
    return response()->json($data);
});