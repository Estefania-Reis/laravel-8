<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pescas e Aquicultura | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page" style="background-image: url('{{ asset('template/dist/img/img3.jpg') }}');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">
  <br><br>
  <div class="login-box- table-responsive-lg" >
    <!-- /.login-logo -->
    <div class="card card-outline card-primary" style="background-image: url('{{ asset('template/dist/img/img4.jpg') }}');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;">
      <div class="card-header text-center" style="background-color: transparent; color: rgb(251, 255, 251); box-shadow: 0 5px 30px rgb(236, 226, 226);">
        <a href="layout.admin" class="h1 embed-responsive"><b style="font-size: 22px">Pescas e Aquicultura</b><br><b style="font-size: 22px">Municipio Ermera</b></a>
      </div>
      <div class="card-body" style="background-color: transparent; box-shadow: 0 5px 30px rgb(232, 217, 217); color:aquamarine">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="/loginproses" method="post">
        @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        
        <!-- /.social-auth-links -->

    
        <p class="mb-0">
          <a href="/register" class="text-center"  style="color: rgb(237, 245, 242)"><b> Register a new membership</b></a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
</body>

</html>