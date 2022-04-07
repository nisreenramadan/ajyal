<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::all();
        return view('admin.teachers.index',['teachers'=>$teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
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
            'scientific_grade'          => 'required|string|min:4',
            'scientific_certificate'    => 'required|string|min:4',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password  = Hash::make($request->password);
        $user->save();

        $teacher = new Teacher();
        $teacher->scientific_grade = $request->scientific_grade;
        $teacher->scientific_certificate = $request->scientific_certificate;
        $teacher->user_id= $user->id;
        $teacher->save();


        return redirect()->route('admin.teachers.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show',['teacher'=>$teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit',['teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'     => 'required|string|min:4|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'scientific_grade'          => 'required|string|min:4',
            'scientific_certificate'    => 'required|string|min:4',
        ]);

        $user= new user();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password  = Hash::make($request->password);
        $user->save();


        $teacher->scientific_grade = $request->scientific_grade;
        $teacher->scientific_certificate = $request->scientific_certificate;
        $teacher->user_id= $user->id;
        $teacher->save();


        return redirect()->route('admin.teachers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('admin.teachers.index');
    }
}
