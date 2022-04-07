@extends('layouts.app', ['activePage' => 'Teachers', 'titlePage' => __('Teachers')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{-- <form method="post" action="{{ route('admin.teachers.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data"> --}}
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
                                    <div class="col-md-3">
                                        <div class="alert alert-info">
                                            <span><strong>Name</strong> : <br>
                                                {{ $teacher->user->name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Email</strong> : <br>
                                                {{ $teacher->user->email }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Scientific_Grade</strong> : <br>
                                                {{ $teacher->scientific_grade }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Scientific_Certificate</strong> : <br>
                                                {{ $teacher->scientific_certificate }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
