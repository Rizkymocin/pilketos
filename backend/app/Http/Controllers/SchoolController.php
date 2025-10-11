<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolPic;
use App\Models\User;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //

    public function getSchoolByPicEmail(Request $request)
    {
        // Get email from authenticated user instead
        $email = $request->user()->email;

        $user = User::where('email', $email)->first();
        $pic = SchoolPic::where('user_id', $user->id)->with('school')->first();

        if($pic === null) {
            return response()->json([
                'status' => false,
                'message' => 'PIC not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $pic->school ?? null
        ]);
    }
}
