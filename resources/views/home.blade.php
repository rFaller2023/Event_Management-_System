<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

    <script>
    const token = localStorage.getItem('token');
    // console.log(localStorage.getItem('id'));
    if (!token) {
      window.location.href = '/';
    }
    const userId = localStorage.getItem('id');
    // console.log(userId);
    document.addEventListener("DOMContentLoaded", function() {
      //Production must have url https://planpath.online/api/user
    fetch('http://127.0.0.1:8000/api/user', {
        method: 'GET',
        headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token'),
            Accept: 'application/json',
            body: JSON.stringify({
                user_id: userId
            })
        }
    }).then(response => response.json())
    .then(response => {
        console.log(response);
        document.getElementById('RoleName').textContent = response.role_name;
        document.getElementById('Name').textContent = response.name;

        if (response.role_name === 'organizer') {
            document.getElementById('sideOrganizer').innerHTML = `
                <li class="nav-item">
                  <a class="nav-link" href="/event">Manage Events</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/venue">Venues</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/attendee">Attendees</a>
                  <div class="collapse" id="charts">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/schedule">Schedules</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/ticket">Ticket</a>
                </li>`;
        } else if (response.role_name === 'guest') {
            document.getElementById('sideGuest').innerHTML = `
                <li class="nav-item">
                  <a class="nav-link" href="/event">Manage Events</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="/venue">Venues</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/ticket">Ticket</a>
                </li>`;
        } else if (response.role_name === 'attendee') {
            document.getElementById('sideAttendee').innerHTML = `
                <li class="nav-item">
                  <a class="nav-link" href="/event">Manage Events</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/venue">Venues</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/schedule">Schedules</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/ticket">Ticket</a>
                </li>`;
        } else if (response.role_name === 'Admin') {
            document.getElementById('sideAdmin').innerHTML = `
                <li class="nav-item">
                  <a class="nav-link" href="/user">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/event">Manage Events</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/venue">Venues</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/attendee">Attendees</a>
                  <div class="collapse" id="charts">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/organizer">Organizers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/schedule">Schedules</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/ticket">Ticket</a>
                </li>`;
        }
    });
});

    //   fetch('/api/user', {
    //       method: 'GET',
    //       headers: {
    //         Authorization: 'Bearer ' + localStorage.getItem('token'),
    //         Accept: 'application/json',
    //         body: JSON.stringify({
    //           user_id: userId
    //         })
    //       }})
    //     }).then(response => response.json())
    //     .then(response => {
    //     console.log(response);
    //       let Uri = window.location.hostname;
    //       if(response.profile_image){
    //         document.getElementById('userID').innerHTML =  `<img  width="35" src={{asset('storage/${response.profile_image}')}} height="35" class="rounded-circle">;`
    //       }else{
    //         document.getElementById('userID').innerHTML =  `<img  width="35" src={{asset("images/profile_default.png")}} height="35" class="rounded-circle">;`
    //       }
    //       console.log(Uri);

    //       if (response.role_id == 1) {
    //         document.getElementById('roleName').textContent = 'Admin';
    //       } else if (response.role_id == 2) {
    //         document.getElementById('roleName').textContent = 'Organizer';
    //       } else if (response.role_id == 3) {
    //         document.getElementById('roleName').textContent = 'Attendee';
    //     }

    </script>

  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-3">
              <div class="d-flex align-items-center justify-content-between">
                <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/" target="_blank" class="btn me-2 buy-now-btn border-0">Buy Now</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white mr-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <a class="navbar-brand brand-logo" href="index.html"><img src='{{asset("img/PLANPATH.png")}}' /></a>
          {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('/img/PLANPATH.png" alt="logo')}}" /></a> --}}
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{asset('assets/images/faces/face23.jpg')}}" alt="image">
                  <span class="availability-status online" id="Name"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0);" onclick="signout()">
                    <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                  </a>

                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                  <script>
                  function signout() {
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "You will be signed out!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, sign out!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        localStorage.removeItem('token');
                        // Replace with your sign-out URL or form submission
                        window.location.href = '/';
                      }
                    })
                  }
                  </script>

            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face4.jpg" alt="image')}}" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-cog"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('assets/images/faces/face23.jpg')}}" alt="profile" />
                  <span class="login-status online" id="RoleName"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2" id="roleName"></span>
                  <span class="text-secondary text-small"></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
           <div id="sideOrganizer"></div>
           <div id="sideGuest"></div>
           <div id="sideAttendee"></div>
           <div id="sideAdmin"></div>

          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              @yield('table')
              <h3 class="page-title">
                {{-- <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>

                </span> Dashboard --}}


          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              {{-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> --}}
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>3
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <script src="{{asset('assets/js/jquery.cookie.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
