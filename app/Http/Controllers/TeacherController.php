<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = (new Teacher())->getAllTeachers();

        return response()->json([
            'status' => true,
            'message' => 'Teachers retrieved successfully.',
            'data' => $teachers
        ]);
    }

    public function show($id)
    {
        $teacher = (new Teacher())->getTeacherById($id);

        if ($teacher) {
            return response()->json([
                'status' => true,
                'message' => 'Teacher found.',
                'data' => $teacher
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Teacher not found.'
        ], 404);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'sometimes|required|string|max:255',
            'faculty' => 'sometimes|required|string|max:100',
            'course' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $teacher = (new Teacher())->createTeacher($data);

        return response()->json([
            'status' => true,
            'message' => 'Teacher created successfully.',
            'data' => $teacher
        ], 201);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'sometimes|required|string|max:255',
            'faculty' => 'sometimes|required|string|max:100',
            'course' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $updatedTeacher = (new Teacher())->updateTeacher($id, $data);

        if ($updatedTeacher) {
            return response()->json([
                'status' => true,
                'message' => 'Teacher updated successfully.',
                'data' => $updatedTeacher
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Teacher not found.'
        ], 404);
    }

    public function destroy($id)
    {
        $deleted = (new Teacher())->deleteTeacher($id);

        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Teacher deleted successfully.'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Teacher not found.'
        ], 404);
    }
}
