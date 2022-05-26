<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'courses_count' => Auth::user()->student->badges()->whereNull('book_id')->get(),
            'books_count' => Auth::user()->student->badges()->whereNull('course_id')->get(),
        ];
    }
}
