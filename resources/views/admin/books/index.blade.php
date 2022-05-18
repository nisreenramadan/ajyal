@extends('layouts.app', ['activePage' => 'Books', 'titlePage' => __('Books')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Books') }}</h4>
                            <p class="card-category"> Here you can manage books</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.books.create') }}" class="btn btn-sm btn-primary">Add
                                        Book</a>
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
                                                Description
                                            </th>
                                            <th>
                                             Link
                                            </th>
                                            <th>
                                             Author
                                            </th>
                                            <th>
                                             Category
                                            </th>

                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>
                                                    {{ $book->id }}
                                                </td>
                                                <td>
                                                    {{ $book->title}}
                                                </td>
                                                <td>
                                                    {{ $book->description}}
                                                </td>
                                                <td>
                                                    {{ $book->link}}
                                                </td>
                                                <td>
                                                    {{ $book->author}}
                                                </td>
                                                <td>
                                                    {{ $book->category->name}}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.books.destroy', $book) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-primary btn-link"
                                                        href="{{ route('admin.books.show', $book) }}"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">visibility</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.books.edit', $book) }}"
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
