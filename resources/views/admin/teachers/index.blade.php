@extends('layouts.app', ['activePage' => 'teacher', 'titlePage' => __('Teachers')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('teachers') }}</h4>
                            <p class="card-category"> Here you can manage teachers</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.teachers.create') }}" class="btn btn-sm btn-primary">Add
                                        teacher</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                Id
                                            </th>
                                            <th>
                                               Name
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                               Password
                                            </th>
                                            <th>
                                                Scientific_Grade
                                            </th>
                                            <th>
                                                Scientific_Certificate
                                            </th>
                                            <th>
                                                Created At
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>
                                                    {{ $teacher->id }}
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.teachers.show', $teacher) }}">{{ $teacher->user->name}}</a>
                                                </td>
                                                <td>
                                                    {{ $teacher->user->email }}
                                                </td>
                                                <td>
                                                    {{ $teacher->user->password }}

                                                </td>
                                                <td>
                                                    {{ $teacher->scientific_grade }}
                                                </td>
                                                <td>
                                                    {{ $teacher->scientific_certificate }}
                                                </td>
                                                <td>
                                                    {{ $teacher->created_at }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.teachers.destroy', $teacher) }}"
                                                        method="course">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.teachers.edit', $teacher) }}"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-link"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">delete</i>
                                                            <div class="ripple-container"></div>
                                                        </button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
