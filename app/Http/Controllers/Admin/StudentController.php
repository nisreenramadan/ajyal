<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();
        return view('admin.students.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.students.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:4|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'age'      => 'required',
            'role_id'  => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password  = Hash::make($request->password);
        $user->save();


       $role = Role::find($request->role_id);
       $user->assignRole($role);

        $student = new Student();
        $student->age = $request->age;
        $student->user_id= $user->id;
        $student->save();


        return redirect()->route('admin.students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.students.show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $roles = Role::all();
        return view('admin.students.edit', ['roles' => $roles, 'student' => $student]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Student $student)
    {
        $request->validate([
            'name'         => 'required|string|min:4|max:255',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:8',
            'age'          => 'required',
            'role_id'      => 'required|exists:roles,id',
        ]);

        $user= new user();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password  = Hash::make($request->password);
        $user->save();


        $student->age = $request->age;
        $student->user_id= $user->id;
        $student->save();

        $role = Role::find($request->role_id);
        $user->assignRole($role);


        return redirect()->route('admin.students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index');
    }
}
