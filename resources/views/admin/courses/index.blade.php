@extends('layouts.app', ['activePage' => 'Courses', 'titlePage' => __('Courses')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('courses') }}</h4>
                            <p class="card-category"> Here you can manage courses</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.courses.create') }}" class="btn btn-sm btn-primary">Add
                                        Course</a>
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
                                                Description
                                            </th>
                                            <th>
                                               Teacher
                                            </th>
                                            <th>
                                                Category
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
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>
                                                    {{ $course->id }}
                                                </td>
                                                <td>
                                                    {{ $course->name}}
                                                </td>
                                                <td>
                                                    {{ $course->description }}
                                                </td>
                                                <td>
                                                    {{ $course->teacher->user->name }}

                                                </td>
                                                <td>
                                                    {{ $course->category->course_category }}

                                                </td>
                                                <td>
                                                    {{ $course->created_at }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.courses.destroy', $course) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-primary btn-link"
                                                        href="{{ route('admin.courses.show', $course) }}"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">visibility</i>
                                                        <div class="ripple-container"></div>
                                                      </a>
                                                      <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('admin.courses.edit', $course) }}"
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
