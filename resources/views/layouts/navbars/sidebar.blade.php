<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'post' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.posts.index') }}">
                  <i><i class="material-icons">description</i></i>
                  <span class="sidebar-normal">{{ __('Manage Post') }} </span>
                </a>
              </li>

            <li class="nav-item{{ $activePage == 'course' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.courses.index') }}">
                    <i><i class="material-icons">cast_for_education</i></i>
                  <span class="sidebar-normal">{{ __('Manage Courses') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'lecture' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.lectures.index') }}">
                    <i><i class="material-icons">smart_display</i></i>
                  <span class="sidebar-normal">{{ __('Manage Lectures') }} </span>
                </a>
              </li>
            <li class="nav-item{{ $activePage == 'teacher' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.teachers.index') }}">
                <i><i class="material-icons">person</i></i>
                <span class="sidebar-normal">{{ __('Manage Teachers') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'book' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.books.index') }}">
                <i><i class="material-icons">library_books</i></i>
                <span class="sidebar-normal"> {{ __('Manage Books') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'category' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <i><i class="material-icons">category</i></i>
                <span class="sidebar-normal"> {{ __('Manage Categories') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'student' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.students.index') }}">
                  <i><i class="material-icons">person</i></i>
                  <span class="sidebar-normal"> {{ __('Manage student') }} </span>
                </a>
              </li>
          </ul>
        </div>
      </li>
      {{-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a> --}}
      </li>
      {{-- <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li> --}}
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
