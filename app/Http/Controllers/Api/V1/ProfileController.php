<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(["user" => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            //  Rule::unique('users')->ignore(Auth::user()->id),
            'password'       => 'required|string|min:8',
            'age'            => 'required'
        ]);

        /* App\Model\User $user */
        $user = Auth::user();
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password
            // 'photo'     => Storage::url($file),
        ]);

        $student = $user->student;
        $student->update([
            'age'       => $request->age,
            'user_id'     => Auth::id(),
        ]);
        return [
            'message' => 'User information updated Successfully'
        ];
    }

}
