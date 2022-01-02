<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if(Auth::user()->profile_picture)
            <div class="image">
                <img src="{{ Auth::user()->profile_picture->getUrl('preview') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
        @endif
        <div class="info">
            @foreach(Auth::user()->roles as $key => $item)
                <a href="{{ route('profile.password.edit')}}" class="d-block"
                   style="text-transform: uppercase">{{ $item->title }}</a>
            @endforeach
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("dean.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('category_access')
                    <li class="nav-item">
                        <a href="{{ route("dean.categories.index") }}"
                           class="nav-link {{ request()->is("dean/categories") || request()->is("dean/categories/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-align-justify">

                            </i>
                            <p>
                                {{ trans('cruds.category.title') }}
                            </p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route("dean.hods.index") }}"
                       class="nav-link {{ request()->is("dean/hods") || request()->is("dean/hods/*") ? "active" : "" }}">
                        <i class="fa-fw nav-icon fa fa-list">

                        </i>
                        <p>
                            Hod List
                        </p>
                    </a>
                </li>

                @can('testimonial_access')
                    <li class="nav-item">
                        <a href="{{ route("dean.testimonials.index") }}"
                           class="nav-link {{ request()->is("dean/testimonials") || request()->is("dean/testimonials/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-vials">

                            </i>
                            <p>
                                {{ trans('cruds.testimonial.title') }}
                            </p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route("dean.users.index") }}"
                       class="nav-link {{ request()->is("dean/users") || request()->is("dean/users/*") ? "active" : "" }}">
                        <i class="fa-fw nav-icon fas fa-user">

                        </i>
                        <p>
                            Manage HODs
                        </p>
                    </a>
                </li>

                @can('student_access')
                    <li class="nav-item">
                        <a href="{{ route("dean.students.index") }}"
                           class="nav-link {{ request()->is("dean/students") || request()->is("dean/students/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-graduate">

                            </i>
                            <p>
                                {{ trans('cruds.student.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('mentor_access')
                    <li class="nav-item">
                        <a href="{{ route("dean.mentors.index") }}"
                           class="nav-link {{ request()->is("dean/mentors") || request()->is("dean/mentors/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.mentor.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('department_access')
                    <li class="nav-item">
                        <a href="{{ route("dean.departments.index") }}"
                           class="nav-link {{ request()->is("dean/departments") || request()->is("dean/departments/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-align-left">

                            </i>
                            <p>
                                List Departments
                            </p>
                        </a>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                               href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                        <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
