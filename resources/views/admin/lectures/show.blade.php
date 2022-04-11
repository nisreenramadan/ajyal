@extends('layouts.app', ['activePage' => 'Lectures', 'titlePage' => __('Lectures')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.lectures.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Lecture Information') }}</h4>
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
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Sort</strong> : <br>
                                                {{ $lecture->sort }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="alert alert-info">
                                            <span><strong>Title</strong> : <br>
                                                {{ $lecture->title }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Description</strong> : <br>
                                                {{ $lecture->description }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Course</strong> : <br>
                                                {{ $lecture->course->name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="alert alert-info">
                                            <span><strong>Videos</strong> : <br>
                                                <div class="row">
                                                    @foreach ($mediaItems as $mediaItem)
                                                        <video type="video/mp4" width="500" autoplay controls>
                                                            <source src="{{ $mediaItem->getUrl() }}">
                                                        </video>
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
