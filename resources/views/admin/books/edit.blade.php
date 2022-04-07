@extends('layouts.app' , ['activePage' => 'Books', 'titlePage' => __('Books')])
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title is-2">Edit New Book</h3>
                    <form method="post" action="{{ route('admin.books.update',$book) }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Book information') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                name="title" id="input-title" type="text"
                                                placeholder="{{ __('title') }}" value="{{ $book->title }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('title'))
                                                <span id="title" class="error text-danger"
                                                    for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                name="description" id="input-description"
                                                placeholder="{{ __('description') }}"
                                                required>{{ $book->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger"
                                                    for="input-description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Link') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}"
                                                name="link" id="input-link"
                                                placeholder="{{ __('link') }}"
                                                required>{{ $book->link }}</textarea>
                                            @if ($errors->has('link'))
                                                <span id="link-error" class="error text-danger"
                                                    for="input-link">{{ $errors->first('link') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Author') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('author') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}"
                                                name="author" id="input-author"
                                                placeholder="{{ __('author') }}"
                                                required>{{ $book->author }}</textarea>
                                            @if ($errors->has('author'))
                                                <span id="author-error" class="error text-danger"
                                                    for="input-author">{{ $errors->first('author') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                            <select
                                                class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                                name="category_id" id="input-title-ar" type="text"
                                                placeholder="{{ __('Category') }}" value="{{ old('category_id') }}"
                                                required="true" aria-required="true">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('category_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Edit Book') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
