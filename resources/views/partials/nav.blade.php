<div class="search-form">
  <form action="#" method="GET">
      <div class="input-group">
          <input type="text" name="search" class="form-control search-input"
              placeholder="Type something...">
          <span class="input-group-btn">
              <button class="btn btn-default" id="close-search" type="button">
                  <i class="icon-close"></i>
              </button>
          </span>
      </div>
  </form>
</div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
      <div class="navbar-header">
          <div class="logo-sm">
              <a href="#" id="sidebar-toggle-button"><i class="fas fa-bars"></i></a>
              <a class="logo-box" href="#"><span>Evince</span></a>
              <!-- <img src="traders-assets/img/admin-logo2.png" alt=""> -->
          </div>
          <button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse"
              data-bs-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <i class="fa fa-angle-down"></i>
          </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li><a href="#" id="collapsed-sidebar-toggle-button"><i class="fas fa-bars"></i></a>
              </li>
              <li><a href="#" id="toggle-fullscreen"><i class="fas fa-expand"></i></a></li>
              <!-- <li><a href="#"><img src="traders-assets/img/checked-icon.png" alt=""></a></li> -->
              <!-- <li><a href="#"><img src="traders-assets/img/chat-icon.png" alt=""></a></li> -->
              <li><a href="#"><img src="{{ asset('traders-assets/img/email-icon.png') }}" alt=""></a></li>
              <!-- <li><a href="#"><img src="traders-assets/img/calander-icon.png" alt=""></a></li> -->
              <!-- <li><a href="#"><img src="traders-assets/img/star-icon.png" alt=""></a></li> -->
              <li><a href="#"><img src="{{ asset('traders-assets/img/line.png') }}" alt=""></a></li>
              <li><a href="#" id="search-button"><img src="{{ asset('traders-assets/img/search-icon.png') }}" alt=""></a></li>
              <!-- <li><a href="#">Mentors Online <span class="ms-3 avatar-image"><img class="rounded-circle" src="traders-assets/img/avatar-01.png" alt=""><span class="user-status"></span></span></a></li> -->
              <!-- <li><a href="#"><span class="avatar-image"><img class="rounded-circle" src="traders-assets/img/avatar-01.png" alt=""><span class="user-status"></span></a></li>
              <li><a href="#"><span class="avatar-image"><img class="rounded-circle" src="traders-assets/img/avatar-01.png" alt=""><span class="user-status"></span></a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <!-- <li><a href="#" class="right-sidebar-toggle" data-sidebar-id="main-right-sidebar"><i
                          class="fa fa-envelope"></i></a></li> -->
                          <!-- <li class="dropdown">
                              <a href="#">
                              <img src="traders-assets/img/usa-flag.png" alt="">
                              <span class="mb-0 small text-end">English</span>
                          </a>
                          </li> -->
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                      aria-haspopup="true" aria-expanded="false">
                      <img class="rounded-circle" src="{{ asset('traders-assets/img/bell-icon.png') }}" alt=""><span class="notification-status">4</span>
                  </a>
                  <ul class="dropdown-menu dropdown-lg dropdown-content">
                      <li class="drop-title">Notifications<a href="#" class="drop-title-link">
                          <i class="fa fa-angle-right"></i></a></li>
                      <li class="slimscroll dropdown-notifications">
                          <ul class="list-unstyled dropdown-oc">
                              <li>
                                  <a href="#"><span class="notification-badge bg-primary"><i
                                              class="far fa-image"></i></span>
                                      <span class="notification-info">Finished uploading photos to
                                          gallery <b>"South Africa"</b>.
                                          <small class="notification-date">20:00</small>
                                      </span></a>
                              </li>
                              <li>
                                  <a href="#"><span class="notification-badge bg-primary"><i
                                              class="fa fa-at"></i></span>
                                      <span class="notification-info"><b>John Doe</b> mentioned you in
                                          a post "Update v1.5".
                                          <small class="notification-date">06:07</small>
                                      </span></a>
                              </li>
                              <li>
                                  <a href="#"><span class="notification-badge bg-danger"><i
                                              class="fa fa-bolt"></i></span>
                                      <span class="notification-info">4 new special offers from the
                                          apps you follow!
                                          <small class="notification-date">Yesterday</small>
                                      </span></a>
                              </li>
                              <li>
                                  <a href="#"><span class="notification-badge bg-success"><i
                                              class="fa fa-bullhorn"></i></span>
                                      <span class="notification-info">There is a meeting with
                                          <b>Ethan</b> in 15 minutes!
                                          <small class="notification-date">Yesterday</small>
                                      </span></a>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </li>
              <li class="dropdown user-dropdown ms-3">
                  <p class="mb-0 avatar-name">{{ Auth::user()->name }}</p>
                  <p class="mb-0 small text-end">Admin</p>
              </li>
              <li class="dropdown user-dropdown">
                  <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                      aria-haspopup="true" aria-expanded="false"><span class="avatar-image"><img class="rounded-circle" src="{{ asset('traders-assets/img/avatar-01.png') }}" alt=""><span class="user-status"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="{{ route('profile.index') }}">Profile</a></li>
                      <li><a href="#">Calendar</a></li>
                      <li><a href="#"><span class="badge float-end bg-danger">42</span>Messages</a>
                      </li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">Account Settings</a></li>
                      <li>
                        <a href="{{ route('admin_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
</nav>