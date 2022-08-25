<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard.index') }}" class="brand-link">
    <img src="{{ asset('logo/cropped-fav-512x450.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Traders Hub</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link {{ (request()->segment(2) == 'users') ? 'active' : ''}}">
            <i class="nav-icon fas fa-users"></i>
            <p>Users Management</p>
          </a>
        </li>
       <!--  <li class="nav-item">
          <a href="{{ route('roles.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Roles</p>
          </a>
        </li> -->
        <li class="nav-item {{ (request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') ? 'menu-open' : ''}} ">
          <a href="#" class="nav-link {{ (request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') ? 'active' : ''}}">
            <i class="nav-icon fas fa-id-badge"></i>
            <p>
              Role Mangement
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('roles.index') }}" class="nav-link {{ (request()->segment(2) == 'roles') ? 'active' : ''}}">
                <i class="nav-icon fas fa-user-secret"></i>
                <p>Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('permissions.index') }}" class="nav-link {{ (request()->segment(2) == 'permissions') ? 'active' : ''}}">
                <i class="fa fa-universal-access nav-icon"></i>
                <p>Permissions</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('meetings.index') }}" class="nav-link">
            <i class="nav-icon fas fa-video"></i>
            <p>Meetings</p>
          </a>
        </li>

        <li class="nav-header"><strong>POST</strong></li>
        <li class="nav-item">
          <a href="{{ route('posts.index') }}" class="nav-link">
            <i class="nav-icon fas fa-clipboard"></i>
            <p>Posts</p>
          </a>
        </li>

        <li class="nav-header"><strong>Video</strong></li>
        <li class="nav-item">
          <a href="{{ route('video-post.index') }}" class="nav-link">
            <i class="nav-icon fab fa-youtube"></i>
            <p>Video post</p>
          </a>
        </li>

        <li class="nav-header"><strong>LMS</strong></li>
        <li class="nav-item {{ (request()->segment(2) == 'courses' || request()->segment(2) == 'course-category') ? 'menu-open' : ''}}">
          <a href="#" class="nav-link {{ (request()->segment(2) == 'courses' || request()->segment(2) == 'course-category') ? 'active' : ''}}">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              Course
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('courses.index') }}" class="nav-link {{ (request()->segment(2) == 'courses') ? 'active' : ''}}">
                <i class="fas fa-book nav-icon"></i>
                <p>Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('course-category.index') }}" class="nav-link {{ (request()->segment(2) == 'course-category') ? 'active' : ''}}">
                <i class="fas fa-sitemap nav-icon"></i>
                <p>Courses category</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header"><strong>Quiz</strong></li>
        <li class="nav-item {{ (request()->segment(2) == 'topics' || request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'menu-open' : ''}}">
          <a href="{{ route('topics.index') }}" class="nav-link {{ (request()->segment(2) == 'topics' || request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'active' : ''}}">
            <i class="nav-icon fas fa-dice-d6"></i>
            <p>
              Quizes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('topics.index') }}" class="nav-link {{ (request()->segment(2) == 'topics') ? 'active' : ''}}">
                <i class= "far fas fa-folder-open nav-icon"></i>
                <p>Topics</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('questions.index') }}" class="nav-link {{ (request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'active' : ''}}">
                <i class="far fas fa-book nav-icon"></i>
                <p>Questions</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ route('option.index') }}" class="nav-link {{ (request()->segment(2) == 'option') ? 'active' : ''}}">
                <i class="far fas fa-key nav-icon"></i>
                <p>Options</p>
              </a>
            </li> --}}
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ route('faq.index') }}" class="nav-link {{ (request()->segment(2) == 'faq') ? 'active' : ''}}">
            <i class="nav-icon fas fa-comment"></i>
            <p>FAQs</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>