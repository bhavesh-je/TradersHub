  <div class="page-sidebar-menu">
      <ul class="accordion-menu">
          <li>
              <a href="{{ route('dashboard.index') }}" class="{{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                  <img src="{{ asset('traders-assets/img/dashboard.png') }}" alt=""><span
                      class="ms-3">Dashboard</span>
              </a>
          </li>

        <li><span class="menu-title">USER & ROLE MANAGEMENT</span></li>
        <li>
            <a href="{{ route('users.index') }}" class="{{ request()->segment(2) == 'users' ? 'active' : '' }}">
                <img src="{{ asset('traders-assets/img/user.png') }}" alt=""><span
                    class="ms-3">Users Management</span>
            </a>
        </li>
        <li class="mb-4 {{ (request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') ? 'menu-active' : ''}} ">
            <a href="{{ route('roles.index') }}" class="{{ (request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') ? 'active' : ''}}">
                <img src="{{ asset('traders-assets/img/user.png') }}" alt="">
                <span class="ms-3">Role Mangement</span>
                <i class="accordion-icon fa fa-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ route('roles.index') }}" class="{{ (request()->segment(2) == 'roles') ? 'active' : ''}}"><i class="icon-radio_button_unchecked me-3" id="fixed-sidebar-toggle-button"></i>Roles</a></li>
                <li><a href="{{ route('permissions.index') }}" class="{{ (request()->segment(2) == 'permissions') ? 'active' : ''}}"><i class="icon-radio_button_unchecked me-3" id="fixed-sidebar-toggle-button"></i>Permissions</a></li>
            </ul>
        </li>
        <li><span class="menu-title">CONFERENCE</span></li>
        <li>
            <a href="{{ route('meetings.index') }}" class="{{ request()->segment(2) == 'meetings' ? 'active' : '' }}">
                <img src="{{ asset('traders-assets/img/icon-05.png') }}" alt=""><span
                    class="ms-3">Meetings</span>
            </a>
        </li>
        <li><span class="menu-title">FEEDS</span></li>
        <li>
            <a href="{{ route('posts.index') }}" class="{{ request()->segment(2) == 'posts' ? 'active' : '' }}">
                <img src="{{ asset('traders-assets/img/icon-07.png') }}" alt=""><span
                    class="ms-3">Posts</span>
            </a>
        </li>
        <li>
            <a href="{{ route('video-post.index') }}" class="{{ request()->segment(2) == 'video-post' ? 'active' : '' }}">
                <img src="{{ asset('traders-assets/img/icon-07.png') }}" alt=""><span
                    class="ms-3">Video post</span>
            </a>
        </li>
        <li><span class="menu-title">LMS</span></li>
        <li class="mb-4 {{ (request()->segment(2) == 'courses' || request()->segment(2) == 'course-category') ? 'menu-active' : ''}} ">
            <a href="{{ route('courses.index') }}" class="{{ (request()->segment(2) == 'courses' || request()->segment(2) == 'course-category') ? 'active' : ''}}">
                <img src="{{ asset('traders-assets/img/user.png') }}" alt="">
                <span class="ms-3">Courses</span>
                <i class="accordion-icon fa fa-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ route('course-category.index') }}" class="{{ (request()->segment(2) == 'course-category') ? 'active' : ''}}"><i class="icon-radio_button_unchecked me-3" id="fixed-sidebar-toggle-button"></i>Courses category</a></li>
                <li><a href="{{ route('courses.index') }}" class="{{ (request()->segment(2) == 'courses') ? 'active' : ''}}"><i class="icon-radio_button_unchecked me-3" id="fixed-sidebar-toggle-button"></i>Courses</a></li>
            </ul>
        </li>
        <li><span class="menu-title">Quiz</span></li>
        <li class="mb-4 {{ (request()->segment(2) == 'topics' || request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'menu-active' : ''}} ">
            <a href="{{ route('topics.index') }}" class="{{ (request()->segment(2) == 'topics' || request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'active' : ''}}">
                <img src="{{ asset('traders-assets/img/icon-06.png') }}" alt="">
                <span class="ms-3">Quizes</span>
                <i class="accordion-icon fa fa-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ route('topics.index') }}" class="{{ (request()->segment(2) == 'topics') ? 'active' : ''}}"><i class="icon-radio_button_unchecked me-3" id="fixed-sidebar-toggle-button"></i>Topics</a></li>
                <li><a href="{{ route('questions.index') }}" class="{{ (request()->segment(2) == 'questions' || request()->segment(2) == 'option') ? 'active' : ''}}"><i class="icon-radio_button_unchecked me-3" id="fixed-sidebar-toggle-button"></i>Questions</a></li>
            </ul>
        </li>
        <li><span class="menu-title">KNOWLEDGEBASE</span></li>
        <li>
            <a href="{{ route('faq.index') }}" class="{{ (request()->segment(2) == 'faq') ? 'active' : ''}}">
                <img src="{{ asset('traders-assets/img/dashboard.png') }}" alt=""><span
                    class="ms-3">FAQ'S</span>
            </a>
        </li>
          
      </ul>
  </div>
