
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LEMIS| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./css/adminlte.min.css">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>LEMIS</b>  Login</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">

          <p class="login-box-msg">Login in to start your session</p>
    
         <form method="POST" action="{{ route('login') }}">
                 @csrf
            <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">

              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>


        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>