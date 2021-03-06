@extends('layouts.app', ['activePage' => 'Lectures', 'titlePage' => __('Lectures')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('lectures') }}</h4>
                            <p class="card-category"> Here you can manage lectures</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('teacher.lectures.create') }}" class="btn btn-sm btn-primary">Add
                                        Lecture</a>
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
                                                Sort
                                            </th>
                                            <th>
                                               Title
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                               Course
                                            </th>
                                            {{-- <th>
                                                Video
                                             </th> --}}
                                            <th>
                                              Created At
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lectures as $lecture)
                                            <tr>
                                                <td>
                                                    {{ $lecture->id }}
                                                </td>
                                                <td>
                                                    {{ $lecture->sort}}
                                                </td>
                                                <td>
                                                    {{ $lecture->title}}
                                                </td>
                                                <td>
                                                    {{ $lecture->description }}
                                                </td>
                                                <td>
                                                    {{ $lecture->course->name }}

                                                </td>
                                                {{-- <td>
                                                    <video type="video/mp4" autoplay controls>
                                                        <source src="{{$lecture->getFirstMediaUrl('videos')}}" >
                                                    </video>
                                                </td> --}}
                                                <td>
                                                    {{ $lecture->created_at }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('teacher.lectures.destroy', $lecture) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-primary btn-link"
                                                        href="{{ route('teacher.lectures.show', $lecture) }}"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">visibility</i>
                                                        <div class="ripple-container"></div>
                                                      </a>
                                                      <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('teacher.lectures.edit', $lecture) }}"
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
