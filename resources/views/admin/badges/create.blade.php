@extends('layouts.app', ['activePage' => 'Badge', 'titlePage' => __('New Badge')])

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
                    <form method="post" action="{{ route('admin.badges.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Badges Book Information') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Book') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('book_id') ? ' has-danger' : '' }}">
                                            <select
                                                class="form-control{{ $errors->has('book_id') ? ' is-invalid' : '' }}"
                                                name="book_id" id="input-title-ar" type="text"
                                                placeholder="{{ __('book') }}" value="{{ old('book_id') }}"
                                                required="true" aria-required="true">
                                                @foreach ($books as $book)
                                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('book_id'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('book_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Student') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('student_id') ? ' has-danger' : '' }}">
                                            <select
                                                class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}"
                                                name="student_id" id="input-title-ar" type="text"
                                                placeholder="{{ __('Student') }}" value="{{ old('student_id') }}"
                                                required="true" aria-required="true">
                                                @foreach ($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->id }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('student_id'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('student_id') }}</span>
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
