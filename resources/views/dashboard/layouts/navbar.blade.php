<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ asset("dashboardstyles/images/logo.svg")}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset("dashboardstyles/images/logo-mini.svg")}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset("dashboardstyles/images/faces/face28.jpg")}}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="{{route('account.logout')}}">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">

            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">

        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">


          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="dashboardstyles/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="dashboardstyles/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="dashboardstyles/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="dashboardstyles/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="dashboardstyles/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="dashboardstyles/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
        {{-- visitor role menu.  --}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        @if(\Auth::user()->role_id==1)

              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">Home</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('result.index')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">Results</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('studentcompetition.index')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">Competition</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('student.index')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">Students</span>
                </a>
              </li>
          @elseif(\Auth::user()->role_id==2)
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title"> Home</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title"> Students</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('SchoolRegisteration.index')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title"> Schools </span>
                </a>
              </li>
          @elseif(\Auth::user()->role_id==3)
              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                  <span class="menu-title"> Home</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-staff" aria-expanded="false" aria-controls="ui-staff">
                  <i class="icon-layout menu-icon"> </i>
                  <span class="menu-title">Staff Management</span>
                  <i class="menu-arrow" style="padding-left: 5px"> </i>
                </a>
                <div class="collapse" id="ui-staff">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#"> Attendance Status </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> All Staff </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Calculate Salary </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Staff Attendance </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-students" aria-expanded="false" aria-controls="ui-basic">
                  <i class="icon-layout menu-icon"></i>
                  <span class="menu-title">Students Management</span>
                  <i class="menu-arrow" style="padding-left: 5px"></i>
                </a>
                <div class="collapse" id="ui-students">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#"> Online Students </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> School Students </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Generate Report </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="menu-title"> Accounts Management </span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="menu-title"> Past Board Examination </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="menu-title"> Create Examination  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="menu-title"> Classes Management  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="menu-title"> Staff Management  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="menu-title"> Challans Management  </span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">

                  <span class="menu-title"> Inqueries</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('school-session.index')}}">
                  <span class="menu-title"> Sessions Management </span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">

                  <span class="menu-title"> Settings</span>
                </a>
              </li>

        @endif

        @if (\Auth::user())
        <li class="nav-item">
            <a class="nav-link" href="{{route('change.password')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Change password</span>
            </a>
          </li>

        @endif
        </ul>
    </nav>
