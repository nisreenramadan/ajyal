@extends('layouts.app', ['activePage' => 'Categories', 'titlePage' => __('Categories')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('categories') }}</h4>
                            <p class="card-category"> Here you can manage categories</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">Add
                                        category</a>
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
                                               Category Name
                                            </th>
                                             <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    {{ $category->id }}
                                                </td>
                                                <td>
                                                    {{ $category->name }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-primary btn-link"
                                                        href="{{ route('admin.categories.show', $category) }}"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">visibility</i>
                                                        <div class="ripple-container"></div>
                                                      </a>
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.categories.edit', $category) }}"
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
