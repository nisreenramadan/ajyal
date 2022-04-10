@extends('layouts.app' , ['activePage' => 'Lectures', 'titlePage' => __('Lectures')])
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title is-2">Edit Lecture</h3>
                    <form method="post" action="{{ route('admin.lectures.update',$lecture) }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @method('PUT')
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
                                                placeholder="{{ __('sort') }}" value="{{ $lecture->sort }}"
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
                                                placeholder="{{ __('title') }}" value="{{ $lecture->title }}"
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
                                                required>{{ $lecture->description }}</textarea>
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
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Edit Lecture') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
