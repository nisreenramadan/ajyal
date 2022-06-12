<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <div class="simple-text logo-normal">
            {{ __('Laravel Ajyal') }}
        </div>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Posts' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('teacher.posts.index') }}">
                    <i class="material-icons">description</i>
                    <p>{{ __('Manage posts') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Courses' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.courses.index') }}">
                    <i class="material-icons">cast_for_education</i>
                    <p>{{ __('Manage Courses') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Lectures' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('teacher.lectures.index') }}">
                    <i class="material-icons">smart_display</i>
                    <p>{{ __('Manage Lectures') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Teachers' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.teachers.index') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Manage Teachers') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Books' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.books.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>{{ __('Manage Books') }} </p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Categories' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="material-icons">category</i>
                    <p>{{ __('Manage Categories') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Students' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.students.index') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Manage Students') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Badge' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.badges.index') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Manage Badges') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
