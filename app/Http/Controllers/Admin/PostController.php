<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('viewAny', Post::class);
        $posts = Post::paginate(10);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', Post::class);
        $teachers=Teacher::all();
        return view('admin.posts.create',['teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->authorize('create', Post::class);
        $validation = $request->validate([
            'title'     => 'required|min:3',
            'content'   => 'required',
            'images'    => 'required|array',
            'images.*'    => 'required|file|image',
            'teacher_id'   => 'required',
        ]);
        $post = new Post();
        $post = Post::create($validation);
        if ($request->hasFile('images')) {
            $fileAdders = $post->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('images');
                    });
                }
        //  $post = new post();
        //  $post->teacher_id= auth()->id();
        //  $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post->likes()->count();
        $mediaItems = $post->getMedia('images');
        return view('admin.posts.show', ['post' => $post , 'mediaItems' => $mediaItems]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //$this->authorize('update', $post);
        //$this->authorize('update-post', $post);
        $mediaItems = $post->getMedia('images');
        return view('admin.posts.edit', ['post' => $post , 'mediaItems' => $mediaItems]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'     => 'required|min:3',
            'content'   => 'required',
            'images'    => 'required|array',
            'images.*'    => 'required|file|image'
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $mediaItems = $post->getMedia('images');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //$this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
