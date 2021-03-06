@extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('posts')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                                    <div class="col-md-3">
                                        <div class="alert alert-info">
                                            <span><strong>Title</strong> : <br>
                                                {{ $post->title }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Content</strong> : <br>
                                                {{ $post->content }}</span>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-8">
                                        <div class="alert alert-info">
                                            <span><strong>Images</strong> : <br>
                                                <div class="row">
                                                    @foreach ($mediaItems as $mediaItem)
                                                        <div class="col-md-4">
                                                            <img src="{{ $mediaItem->getUrl() }}"  width="100">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Teacher</strong> : <br>
                                                {{ $post->teacher->user->name }}</span>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="alert">
                                            <span><h3><strong>Display Comments</strong></h3>
                                                <div class="row">
                                                    @foreach ($post->comments as $comment)
                                                        <div class="col-md-4">
                                                           <h4><strong>{{ $comment->user->name }}</strong></h4>
                                                            <p>{{ $comment->content }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="alert">
                                            <span><h3><strong>Add Comments</strong></h3>
                                                <form method="post" action="{{ route('admin.posts.comments.store', ['post' => $post]) }}">
                                                    @csrf
                                                  <div class="form-group">
                                                  <input type="text" name="comment_body" class="form-control" />
                                                  </div>
                                                 <div class="form-group">
                                                  <input type="submit" class="btn btn-primary" value="Add Comment" />
                                                 </div>
                                                </form>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="alert">
                                            <span><h3><strong>Display Likes</strong></h3>
                                                <div class="row">
                                                    @foreach ($post->likes_count as $like)
                                                        <div class="col-md-4">
                                                           <h4><strong>{{ $like->user->name }}</strong></h4>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="alert">
                                            <span><h3><strong>Like</strong></h3>
                                                <form method="post" action="{{  route('admin.posts.likes.store', ['post' => $post]) }}">
                                                    @csrf
                                                 <div class="form-group">
                                                  <input type="submit" class="btn btn-primary" value="Like" />
                                                 </div>
                                                </form>
                                            </span>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
