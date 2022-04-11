@extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('Posts')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Posts') }}</h4>
                            <p class="card-category"> Here you can manage posts</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary">Add
                                        post</a>
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
                                                Title
                                            </th>
                                            <th>
                                                Content
                                            </th>
                                            {{-- <th>
                                                Image
                                            </th> --}}
                                            <th>
                                                Creation date
                                            </th>
                                            <th>
                                                Teacher
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>
                                                    {{ $post->id }}
                                                </td>
                                                <td>
                                                    {{ $post->title }}
                                                </td>
                                                <td>
                                                    {{ $post->content }}
                                                </td>
                                                {{-- <td>
                                                    <img src="{{$post->getFirstMediaUrl('images')}}"  width="1000px">
                                                </td> --}}
                                                <td>
                                                    {{ $post->created_at }}
                                                </td>
                                                <td>
                                                    {{ $post->teacher->user->name }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.posts.destroy', $post) }}"
                                                        method="post">
                                                        @csrf
                                                        <a rel="tooltip" class="btn btn-primary btn-link"
                                                            href="{{ route('admin.posts.show', $post) }}}"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">visibility</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.posts.edit', $post) }}"
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
                            <div class="row">
                                <div class="col-3 text-center m-auto">
                                    {{ $posts->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
