@extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('Posts')])

@section('content')
    <section class="section">
        <div class="container">
            <div class="level">
                <div class="level-left">
                    <div>
                        <h2 class="title is-2">{{ $post->title }}</h2>
                    </div>
                </div>
                <div class="level-right">
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                        @can('update-post', $post)<a class="button is-primary is-light is-outlined"
                            href="{{ route('admin.posts.edit', $post) }}">edit</a>@endcan
                        @csrf
                        @method('DELETE')
                        @can('delete posts')
                            <input class="button is-danger is-light is-outlined" type="submit" value="delete">
                        @endcan
                    </form>
                </div>
            </div>
            <p class="block">
                {{ $post->content }}
            </p>
            <p class="block">
                {{ $post->images }}
            </p>

        </div>
    </section>
@endsection
