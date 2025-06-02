<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = (new Student())->getAllStudents();

        return response()->json([
            'status' => true,
            'message' => 'Students retrieved successfully.',
            'data' => $students
        ]);
    }

    public function show($id)
    {
        $student = (new Student())->getStudentById($id);

        if ($student) {
            return response()->json([
                'status' => true,
                'message' => 'Student found.',
                'data' => $student
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Student not found.'
        ], 404);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'grade' => 'required|string|in:A,B,C,D,F',
            'department' => 'required|string|max:100',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $student = (new Student())->createStudent($data);

        return response()->json([
            'status' => true,
            'message' => 'Student created successfully.',
            'data' => $student
        ], 201);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'grade' => 'required|string|in:A,B,C,D,F',
            'department' => 'required|string|max:100',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $updatedStudent = (new Student())->updateStudent($id, $data);

        if ($updatedStudent) {
            return response()->json([
                'status' => true,
                'message' => 'Student updated successfully.',
                'data' => $updatedStudent
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Student not found.'
        ], 404);
    }

    public function destroy($id)
    {
        $deleted = (new Student())->deleteStudent($id);

        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Student deleted successfully.'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Student not found.'
        ], 404);
    }
}
