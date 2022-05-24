<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BadgeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'   => 'required',
            'course_id' => 'required',
            'book_id' => 'required'
        ]);

        Auth::user()->student->badges()->create($validation);

        return response(['message' => 'badge was created']);
    }
}
