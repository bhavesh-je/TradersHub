<!-- start page loading -->
<div id="preloader">
        <div class="row loader">
            <div class="loader-icon"></div>
        </div>
    </div>
    <!-- end page loading -->

<div class="page-sidebar-menu">
  <ul class="accordion-menu">
    <li class="mb-4 {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
      <a href="{{ route('dashboard.index') }}" class="">
        <img src="{{ asset('traders-assets/img/dashboard.png') }}" alt=""><span class="ms-2">Dashboard</span>
      </a>
    </li>
    <li><span class="menu-title">USER & ROLE MANAGEMENT</span></li>
    <li class="{{ request()->segment(2) == 'users' ? 'active' : '' }}">
      <a href="{{ route('users.index') }}">
          <img src="{{ asset('traders-assets/img/user.png') }}" alt=""><span class="ms-2">Users Management</span>
      </a>
    </li>
    <li class="mb-4 has-sub {{ (request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') ? 'active-page' : ''}}">
      <a href="{{ route('roles.index') }}" class="{{ route('roles.index') }}" class="{{ (request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') ? 'active' : ''}}">
          <img src="{{ asset('traders-assets/img/role-manag-icon.png') }}" alt="">
          <span class="ms-3">Role Mangement</span>
          <i class="accordion-icon fa fa-angle-right"></i>
      </a>
      <ul class="sub-menu">
          <li class="{{ (request()->segment(2) == 'roles') ? 'active' : ''}}"><a href="{{ route('roles.index') }}"><img src="{{ asset('traders-assets/img/box-icon.png') }}" class="me-2" alt="">Roles</a></li>
          <li class="{{ (request()->segment(2) == 'permissions') ? 'active' : ''}}"><a href="{{ route('permissions.index') }}"><img src="{{ asset('traders-assets/img/permission-icon.png') }}" class="me-2" alt="">Permissions</a></li>
      </ul>
      
    </li>
    <li><span class="menu-title">CONFERENCE</span></li>
    <li class="mb-4 {{ request()->segment(2) == 'meetings' ? 'active' : '' }}">
      <a href="{{ route('meetings.index') }}">
        <img src="{{ asset('traders-assets/img/meeting-icon.png') }}" alt=""><span class="ms-2">Meetings</span>
      </a>
    </li>
    <li><span class="menu-title">FEEDS</span></li>
    <li class="{{ request()->segment(2) == 'posts' ? 'active' : '' }}">
      <a href="{{ route('posts.index') }}">
        <img src="{{ asset('traders-assets/img/post-icon.png') }}" alt=""><span class="ms-2">Posts</span>
      </a>
    </li>
    <li class="mb-4 {{ request()->segment(2) == 'video-post' ? 'active' : '' }}">
      <a href="{{ route('video-post.index') }}" >
        <img src="{{ asset('traders-assets/img/video-icon.png') }}" alt=""><span class="ms-2">Video post</span>
      </a>
    </li>
    <li><span class="menu-title">LMS</span></li>
    <li class="mb-4 has-sub {{ (request()->segment(2) == 'courses' || request()->segment(2) == 'course-category') ? 'active-page' : ''}} ">
      <a href="{{ route('courses.index') }}" class="{{ (request()->segment(2) == 'courses' || request()->segment(2) == 'course-category') ? 'active' : ''}}">
          <img src="{{ asset('traders-assets/img/course-icon.png') }}" alt="">
          <span class="ms-2">Courses</span>
          <i class="accordion-icon fa fa-angle-right"></i>
      </a>
      <ul class="sub-menu">
          <li class="{{ (request()->segment(2) == 'course-category') ? 'active' : ''}}"><a href="{{ route('course-category.index') }}" ><img src="{{ asset('traders-assets/img/course-cat-icon.png') }}" class="me-2" alt="">Courses category</a></li>
          <li class="{{ (request()->segment(2) == 'courses') ? 'active' : ''}}"><a href="{{ route('courses.index') }}" ><img src="{{ asset('traders-assets/img/courses-icon.png') }}" class="me-2" alt="">Courses</a></li>
      </ul>
    </li>
    <li><span class="menu-title">Quiz</span></li>
    <li class="mb-4 has-sub {{ (request()->segment(2) == 'topics' || request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'active-page' : ''}} ">
      <a href="{{ route('topics.index') }}" class="{{ (request()->segment(2) == 'topics' || request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'active' : ''}}">
          <img src="{{ asset('traders-assets/img/quiz-icon.png') }}" alt="">
          <span class="ms-2">Quizes</span>
          <i class="accordion-icon fa fa-angle-right"></i>
      </a>
      <ul class="sub-menu">
          <li class="{{ (request()->segment(2) == 'topics') ? 'active' : ''}}"><a href="{{ route('topics.index') }}" ><img src="{{ asset('traders-assets/img/topic-icon.png') }}" class="me-2" alt="">Topics</a></li>
          <li class="{{ (request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'active' : ''}}"><a href="{{ route('questions.index') }}" ><img src="{{ asset('traders-assets/img/question-icon.png') }}" class="me-2" alt="">Questions</a></li>
      </ul>
    </li>
    <li><span class="menu-title">KNOWLEDGEBASE</span></li>
    <li class="{{ (request()->segment(2) == 'faq') ? 'active' : ''}}">
      <a href="{{ route('faq.index') }}" >
          <img src="{{ asset('traders-assets/img/faq-icon.png') }}" alt=""><span class="ms-2">FAQ'S</span>
      </a>
    </li>
  </ul>
</div>