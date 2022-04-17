@extends('layouts.app', ['activePage' => 'Category', 'titlePage' => __('New Category')])

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
                    <form method="post" action="{{ route('admin.categories.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Category Information') }}</h4>
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
                                {{-- book category --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Book Category') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('book_category') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('book_category') ? ' is-invalid' : '' }}"
                                               name="book_category" id="input-book_category" type="text"
                                                placeholder="{{ __('book_category') }}" value="{{ old('book_category') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('book_category'))
                                                <span id="book_category" class="error text-danger"
                                                    for="input-book_category">{{ $errors->first('book_category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- course category --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('course Category') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('course_category') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('course_category') ? ' is-invalid' : '' }}"
                                               name="course_category" id="input-course_category" type="text"
                                                placeholder="{{ __('course_category') }}" value="{{ old('course_category') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('course_category'))
                                                <span id="course_category" class="error text-danger"
                                                    for="input-course_category">{{ $errors->first('course_category') }}</span>
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
