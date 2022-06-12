@extends('layouts.app', ['activePage' => 'Badges', 'titlePage' => __('Badges')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Badges') }}</h4>
                            <p class="card-category"> Here you can manage badges</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.badges.create') }}" class="btn btn-sm btn-primary">Add
                                        Badge</a>
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
                                             Book
                                            </th>
                                            <th>
                                             Student
                                            </th>

                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($badges as $badge)
                                            <tr>
                                                <td>
                                                    {{ $badge->id }}
                                                </td>
                                                <td>
                                                    {{ $badge->name}}
                                                </td>
                                                <td>
                                                    {{ $badge->book->title}}
                                                </td>
                                                <td>
                                                    {{ $badge->student->id}}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.badges.destroy', $badge) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-primary btn-link"
                                                        href="{{ route('admin.badges.show', $badge) }}"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">visibility</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.badges.edit', $badge) }}"
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
