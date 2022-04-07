@extends('layouts.app', ['activePage' => 'Teacher', 'titlePage' => __('New Teacher')])

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
                    <form method="post" action="{{ route('admin.teachers.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Teacher Information') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" id="input-email" type="text"
                                                placeholder="{{ __('email') }}" value="{{ old('email') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('email'))
                                                <span id="email" class="error text-danger"
                                                    for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('PassWord') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" id="input-password" type="password"
                                                placeholder="{{ __('password') }}" value="{{ old('password') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('password'))
                                                <span id="password" class="error text-danger"
                                                    for="input-password">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Scientific_Grade') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('scientific_grade') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('scientific_grade') ? ' is-invalid' : '' }}"
                                               name="scientific_grade" id="input-scientific_grade" type="text"
                                                placeholder="{{ __('scientific_grade') }}" value="{{ old('scientific_grade') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('scientific_grade'))
                                                <span id="scientific_grade" class="error text-danger"
                                                    for="input-scientific_grade">{{ $errors->first('scientific_grade') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Scientific_Certificate') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('scientific_certificate') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('scientific_certificate') ? ' is-invalid' : '' }}"
                                               name="scientific_certificate" id="input-scientific_certificate" type="text"
                                                placeholder="{{ __('scientific_certificate') }}" value="{{ old('scientific_certificate') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('scientific_certificate'))
                                                <span id="scientific_certificate" class="error text-danger"
                                                    for="input-scientific_certificate">{{ $errors->first('scientific_certificate') }}</span>
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
