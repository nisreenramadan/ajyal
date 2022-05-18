@extends('layouts.app', ['activePage' => 'Books', 'titlePage' => __('Books')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Book Information') }}</h4>
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
                                                {{ $book->title }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Description</strong> : <br>
                                                {{ $book->description }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Author</strong> : <br>
                                                {{ $book->author }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Link</strong> : <br>
                                                {{ $book->link }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Category</strong> : <br>
                                                {{ $book->category->name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="alert alert-info">
                                            <span><strong>Files</strong> : <br>
                                                <div class="row">
                                                    @foreach ($mediaItems as $mediaItem)
                                                        <iframe src="{{ $mediaItem->getUrl() }}" height="300" width="500"></iframe>
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
