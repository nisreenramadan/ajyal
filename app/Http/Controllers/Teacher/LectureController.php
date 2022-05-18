<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures=Lecture::all();
         return view('teacher.lectures.index',['lectures' => $lectures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();

    return view('teacher.lectures.create',['courses' => $courses]);
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
            'title'         => 'required|min:3',
            'description'   => 'required',
            'sort'          =>  'required|numeric',
            'course_id'     => 'required',
            // 'videos'    => 'required|array',
            // 'videos.*'    => 'required|file|video',
        ]);
         $lecture = new Lecture();
        $lecture= Lecture::create($validation);
        if ($request->hasFile('videos')) {
            $fileAdders = $lecture->addMultipleMediaFromRequest(['videos'])
                ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('videos');
                    });
                }

        return redirect()->route('teacher.lectures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        $mediaItems = $lecture->getMedia('videos');
        return view('teacher.lectures.show', ['lecture' => $lecture ,'mediaItems' => $mediaItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        $courses=Course::all();
        $mediaItems = $lecture->getMedia('videos');
    return view('teacher.lectures.edit',['courses'=> $courses,'lecture' => $lecture,'mediaItems' => $mediaItems]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'title'     => 'required|min:3',
            'description'   => 'required',
            'course_id'    => 'required|numeric|exists:courses,id',
            'sort'          =>  'required|numeric',


        ]);
        $lecture->title = $request->title;
        $lecture->description = $request->description;
        $lecture->course_id = $request->course_id;
        $lecture->sort = $request->sort;
        $lecture->save();
        if ($request->hasFile('videos')) {
            $lecture->clearMediaCollection('videos');
            $fileAdders = $lecture->addMultipleMediaFromRequest(['videos'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('videos');
                });
        }
        return redirect()->route('teacher.lectures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();

        return redirect()->route('teacher.lectures.index');
    }
}
