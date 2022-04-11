<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books=Book::all();
      return view('admin.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.books.create',['categories' => $categories]);
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
            'title'     => 'required|min:3',
            'description'   => 'required',
            'link'   => 'required',
            'author'   => 'required',
            'category_id'   => 'required',
        ]);
         $book = new Book();
        $book= Book::create($validation);
        if ($request->hasFile('files')) {
            $fileAdders = $book->addMultipleMediaFromRequest(['files'])
                ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('files');
                    });
                }

        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $mediaItems = $book->getMedia('files');
        return view('admin.books.show', ['book' => $book ,'mediaItems' => $mediaItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories=Category::all();
    return view('admin.books.edit',['book'=> $book,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'     => 'required|min:3',
            'description'   => 'required',
            'link'   => 'required',
            'author'   => 'required',
            'category_id'   => 'required',
        ]);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->link = $request->link;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->save();
        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.books.index');

    }
}
