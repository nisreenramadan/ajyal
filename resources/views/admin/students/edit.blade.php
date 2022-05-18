@extends('layouts.app' , ['activePage' => 'Students', 'titlePage' => __('Students')])
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title is-2">Edit Student</h3>
                    <form method="post" action="{{ route('admin.students.update',$student) }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @method('PUT')
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
                                                placeholder="{{ __('name') }}" value="{{ $student->user->name }}"
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
                                            <textarea
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" id="input-email"
                                                placeholder="{{ __('email') }}"
                                                required>{{ $student->user->email }}</textarea>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                    for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" id="input-password"
                                                placeholder="{{ __('password') }}"
                                                required>{{ $student->user->password }}</textarea>
                                            @if ($errors->has('password'))
                                                <span id="password-error" class="error text-danger"
                                                    for="input-password">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Age') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}"
                                                name="age" id="input-age"
                                                placeholder="{{ __('age') }}"
                                                required>{{ $student->age }}</textarea>
                                            @if ($errors->has('age'))
                                                <span id="age-error" class="error text-danger"
                                                    for="input-age">{{ $errors->first('age') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Select Role</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="role_id">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ $role->id == $student->role_id ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('role_id')
                                            <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Edit Student') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
