@extends('layouts.app', ['activePage' => 'Student', 'titlePage' => __('New Student')])

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
                    <form method="post" action="{{ route('admin.students.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Student Information') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Age') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}"
                                               name="age" id="input-age" type="text"
                                                placeholder="{{ __('age') }}" value="{{ old('age') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('age'))
                                                <span id="age" class="error text-danger"
                                                    for="input-age">{{ $errors->first('age') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Bio') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('bio') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}"
                                               name="bio" id="input-bio" type="text"
                                                placeholder="{{ __('bio') }}" value="{{ old('bio') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('bio'))
                                                <span id="bio" class="error text-danger"
                                                    for="input-bio">{{ $errors->first('bio') }}</span>
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
                                <label class="label">Select Role</label>
                                <div class="control">
                                  <div class="select">
                               <select name="role_id">
                                  @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                  @endforeach
                               </select>
                           </div>
                        @error('role_id')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
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
