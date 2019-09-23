
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>LEMIS</title>
  <link href="/img/avatar.png" rel="icon" type="image/png">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <script src="/js/app.js"></script>

  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="/plugins/fullcalendar/fullcalendar.print.css" media="print">

    <!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/plugins/fullcalendar/fullcalendar.min.js"></script>

  <link rel="stylesheet" href="/css/app.css">




</head>

@yield('login')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom mb-2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/img/avatar.png" alt="Levis Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">LEMIS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @php
                      $pic_url =  asset('dist/img/user.jpg');
                      if(auth()->user()->staff_image){
                          $pic_url =  "/storage/cover_images/".auth()->user()->staff_image->photo;
                     }

                  @endphp
          <img src="/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

               <li class="nav-item">
               <a href="{{ route('dashboard.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard                
                  </p>
                </a>
              </li>


              

              <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-fist-raised"></i>
                  <p>
                     HR Managenment
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('staff_details.index') }}" class="nav-link ">
                          <i class="fas fa-user-tie mr-1"></i>
                          <p>Staff </p>
                        </a>
                      </li>
                  <li class="nav-item">
                    <a href="{{ route('payrolls.index') }}" class="nav-link ">
                      <i class="fas fa-money-bill-wave mr-1"></i>
                      <p>Payroll </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('leaves.index') }}" class="nav-link">
                      <i class="fas fa-bed mr-1"></i>
                      <p>Leave </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('holidays.index') }}" class="nav-link">
                      <i class="fas fa-gifts mr-1"></i>
                      <p>Holidays </p>
                    </a>
                  </li>
                </ul>
              </li>





              <li class="nav-item">
              <a href="{{ route('clients.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-briefcase"></i>
                  <p>
                    Clients          
                  </p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('transactions.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-gavel"></i> 
                        <p>
                          Case Types                
                        </p>
                      </a>
                    </li>

                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                          <i class="nav-icon fas fa-file-alt"></i>
                          <p>
                             File Managenment
                            <i class="right fa fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ url('/file_search')}}" class="nav-link ">
                              <i class="nav-icon fas fa-search"></i>
                              <p>File Search</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-file-prescription"></i>
                              <p>Requested Files</p>
                            </a>
                          </li>
                        </ul>
                      </li>

                    <li class="nav-item">
                        <a href="{{ url('/calendar')}}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i> 
                              <p>
                              Calendar                
                              </p>
                            </a>
                          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                 Managenment
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link ">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout                
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->

    <!-- Main content -->
   {{-- <div class="content">--}}
      <div class="container-fluid">
       @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    {{--</div>--}}
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <footer class="main-footer">
   {{-- <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.--}}
  </footer>
</div>
<!-- ./wrapper -->


</body>

</html>
