@extends('layouts.app', ['activePage' => 'Category', 'titlePage' => __('Edit Category')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.categories.update', $category) }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Category') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Book Category') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('book_category') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('book_category') ? ' is-invalid' : '' }}"
                                                name="book_category" id="input-book_category" type="text"
                                                placeholder="{{ __('book_category') }}" value="{{ $category->book_category }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('book_category'))
                                                <span id="book_category" class="error text-danger"
                                                    for="input-book_category">{{ $errors->first('book_category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Course Category') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('course_category') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('course_category') ? ' is-invalid' : '' }}"
                                                name="course_category" id="input-course_category" type="text"
                                                placeholder="{{ __('course_category') }}" value="{{ $category->course_category }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('course_category'))
                                                <span id="course_category" class="error text-danger"
                                                    for="input-course_category">{{ $errors->first('course_category') }}</span>
                                            @endif
                                        </div>
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
