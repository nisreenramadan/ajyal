@extends('layouts.app', ['activePage' => 'Lecture', 'titlePage' => __('New Lecture')])

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
                                    <label class="col-sm-2 col-form-label">{{ __('Sort') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('sort') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('sort') ? ' is-invalid' : '' }}"
                                                name="sort" id="input-sort" type="text"
                                                placeholder="{{ __('sort') }}" value="{{ old('sort') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('sort'))
                                                <span id="sort" class="error text-danger"
                                                    for="input-sort">{{ $errors->first('sort') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                name="title" id="input-title" type="text"
                                                placeholder="{{ __('title') }}" value="{{ old('title') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('title'))
                                                <span id="title" class="error text-danger"
                                                    for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                name="description" id="input-description"
                                                placeholder="{{ __('description') }}"
                                                required>{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger"
                                                    for="input-description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Course') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('course_id') ? ' has-danger' : '' }}">
                                            <select
                                                class="form-control{{ $errors->has('course_id') ? ' is-invalid' : '' }}"
                                                name="course_id" id="input-title-ar" type="text"
                                                placeholder="{{ __('course') }}" value="{{ old('course_id') }}"
                                                required="true" aria-required="true">
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('course_id'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('course_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Videos') }}</label>
                                    <div class="col-sm-7">
                                        <div class="custom-file {{ $errors->has('videos') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control file{{ $errors->has('videos') ? ' is-invalid' : '' }}"
                                                name="videos[]" id="input-videos" type="file" multiple="multiple"
                                                placeholder="{{ __('Upload videos') }}" value="{{ old('videos') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('videos'))
                                                <span id="videos-error" class="error text-danger"
                                                    for="input-videos">{{ $errors->first('videos') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
