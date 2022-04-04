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
                    <form method="post" action="{{ route('admin.courses.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Course Information') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text"
                                                placeholder="{{ __('name') }}" value="{{ old('name') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('name'))
                                                <span id="name" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                            <select
                                                class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                                name="category_id" id="input-title-ar" type="text"
                                                placeholder="{{ __('Category') }}" value="{{ old('category_id') }}"
                                                required="true" aria-required="true">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('category_id') }}</span>
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
