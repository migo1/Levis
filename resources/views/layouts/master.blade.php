
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Levis</title>
  <link href="/img/avatar.png" rel="icon" type="image/png">

<link rel="stylesheet" href="/css/app.css">
</head>
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
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/img/avatar.png" alt="Levis Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Levis</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
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
                      <i class="nav-icon fas fa-concierge-bell"></i> 
                        <p>
                          Transactions                
                        </p>
                      </a>
                    </li>

              <li class="nav-item">
                  <a href="{{ route('files.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-file-alt"></i> 
                        <p>
                          Files                
                        </p>
                      </a>
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
                 Mannagenment
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout                
              </p>
            </a>
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
    <div class="content">
      <div class="container-fluid">
       @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script src="/js/app.js"></script>

</body>
</html>
