<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|min:3|max:255',
            'email'       => 'required|string|email|max:255|unique:users',
            'password'    => 'required|string|min:8',
            'age'         => 'required',
            'bio'         => 'required'
            // 'role_id'     => 'required|exists:roles,id',
        ]);
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),

        ]);
        $student = Student::create([
            'user_id'   => $user->id,
            'age'       => $request->age,
            'bio'       => $request->bio

        ]);
        if ($request->hasFile('images')) {
            $fileAdders = $student->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('images');
                    });
                }

        // $role = Role::find($request->role_id);

        $user->assignRole('student');

     $token = $user->createToken('myapptoken')->plainTextToken;
     $response = [
        'user'    => $user,
        'token'   => $token,
        'student' => $student,
    ];


    return response($response, 201);

    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

}
