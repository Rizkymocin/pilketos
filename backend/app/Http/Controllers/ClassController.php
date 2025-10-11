<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'classname' => 'required|string',
            'grade' => 'required|integer|min:1|max:12',
        ]);

        $class = SchoolClass::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Class created successfully',
            'data' => $class
        ], 201);
    }
}
