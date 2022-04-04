<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
         return view('admin.courses.index',['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $teachers=Teacher::all();

    return view('admin.courses.create',['categories' => $categories,'teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'     => 'required|min:3',
            'description'   => 'required',
            'teacher_id'   => 'required',
            'category_id'   => 'required',
        ]);
         $course = new Course();
        $course= Course::create($validation);

        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', ['course' => $course ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories=Category::all();
        $teachers=Teacher::all();

    return view('admin.courses.edit',['course'=> $course,'categories' => $categories,'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $request->validate([
            'name'     => 'required|min:3',
            'description'   => 'required',
            'teacher_id'    => 'required|numeric|exists:teachers,id',
            'category_id'    => 'required|numeric|exists:categories,id',
        ]);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->teacher_id = $request->teacher_id;
        $course->category_id = $request->category_id;
        $course->save();
        return redirect()->route('admin.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index');
    }
}
