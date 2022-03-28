{{-- @extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('Posts')])

@section('content')
    <section class="section">
        <div class="container">
            <div class="level">
                <div class="level-left">
                    <div>
                        <h2 class="title is-4">{{ $post->title }}</h2>
                    </div>
                </div>
                <div class="level-right">
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                        @can('update-post', $post)<a class="button is-primary is-light is-outlined"
                            href="{{ route('admin.posts.edit', $post) }}">edit</a>@endcan
                        @csrf
                        @method('DELETE')
                        @can('delete posts')
                            <input class="button is-danger is-light is-outlined" type="submit" value="delete">
                        @endcan
                    </form>
                </div>
            </div>
            <p class="block">
                {{ $post->content }}
            </p>
            <p class="block">
                {{ $post->images }}
            </p>
            <hr />
                    <h4>Display Comments</h4>
                    @foreach($post->comments as $comment)
                        <div class="display-comment">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach

            <hr />
            <h4>Add comment</h4>
                    <form method="post" action="{{ route('admin.comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form>

        </div>
    </section>
@endsection --}}








@extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('posts')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.posts.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('post information') }}</h4>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                            class="btn btn-sm btn-primary">Edit
                                            post</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert">
                                            <span><strong>Title</strong> : <br>
                                                {{ $post->title }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert">
                                            <span><strong>Content</strong> : <br>
                                                {{ $post->content }}</span>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="alert ">
                                            <span><strong>Images</strong> : <br>
                                                <div class="row">
                                                    @foreach ($mediaItems as $mediaItem)
                                                        <div class="col-md-4">
                                                            <img src="{{ $mediaItem->getUrl() }}" / width="240px">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                  <hr />
                                <h4>Display Comments</h4>
                             @foreach($post->comments as $comment)
                               <div class="display-comment">
                                  <strong>{{ $comment->user->name }}</strong>
                                   <p>{{ $comment->content }}</p>
                              </div>
                             @endforeach

                            <hr />
                              <h4>Add comment</h4>
                         <form method="post" action="{{ route('admin.comments.store') }}">
                              @csrf
                            <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                           <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                           </div>
                          </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
