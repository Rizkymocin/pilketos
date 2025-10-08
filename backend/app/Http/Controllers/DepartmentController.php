<?php

namespace App\Http\Controllers;

use App\Models\SchoolPic;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getDepartmentsBySchoolPic(Request $request){
        $email = $request->user()->email;

        $user = User::where('email', $email)->first();
        $pic = SchoolPic::where('user_id', $user->id)->with('school.departments')->first();

        return response()->json([
            'status' => true,
            'data' => $pic->school->departments ?? null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeByPic(Request $request)
    {
        $user = $request->user()->email;
        $user = User::where('email', $user)->first();
        $pic = SchoolPic::where('user_id', $user->id)->with('school')->first();

        $validated = $request->validate([
            'department' => 'required|string',
            'shortname' => 'required|string',
        ]);

        $department = $pic->school->departments()->create([
            'department' => $validated['department'],
            'pubic_id' => uniqid('dept_'),
            'shortname' => $validated['shortname'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Department created successfully',
            'data' => $department
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
