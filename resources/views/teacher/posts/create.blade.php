@extends('layouts.app', ['activePage' => 'post-create', 'titlePage' => __('New Post')])

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('teacher.posts.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Post Information') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                name="title" id="input-title" type="text"
                                                placeholder="{{ __('Title') }}" value="{{ old('title') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('title'))
                                                <span id="title" class="error text-danger"
                                                    for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Content') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                                name="content" id="input-content"
                                                placeholder="{{ __('Content') }}"
                                                required>{{ old('content') }}</textarea>
                                            @if ($errors->has('content'))
                                                <span id="content-error" class="error text-danger"
                                                    for="input-content">{{ $errors->first('content') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Images') }}</label>
                                    <div class="col-sm-7">
                                        <div class="custom-file {{ $errors->has('images') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control file{{ $errors->has('images') ? ' is-invalid' : '' }}"
                                                name="images[]" id="input-images" type="file" multiple="multiple"
                                                placeholder="{{ __('Upload Images') }}" value="{{ old('images') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('images'))
                                                <span id="images-error" class="error text-danger"
                                                    for="input-images">{{ $errors->first('images') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Teacher') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('teacher_id') ? ' has-danger' : '' }}">
                                            <select
                                                class="form-control{{ $errors->has('teacher_id') ? ' is-invalid' : '' }}"
                                                name="teacher_id" id="input-title-ar" type="text"
                                                placeholder="{{ __('teacher_id') }}" value="{{ old('teacher_id') }}"
                                                required="true" aria-required="true">
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('teacher->id'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('teacher->id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                               {{-- <input type="hidden" name="teacher_id" value="{{ Auth::user()->id }}"> --}}
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
