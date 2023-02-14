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

<body class="hold-transition login-page" style="background-image: url('{{ asset('template/dist/img/login.png') }}');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;">


  <br><br>
  @if(session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <br><br><br><br>
  
  <div class="login-box- table-responsive-lg ml-5">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary ml-5" style="background-image: url('{{ asset('template/dist/img/login.png') }}');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
    width:200%;
    color:rgb(10, 82, 15)">
      <div class="card-header text-center">
        <a href="layout.admin" class="h1 embed-responsive"><b style="font-size: 22px">Pescas e Aquicultura</b><br><b style="font-size: 22px">Centro Viveiros Gleno-Ermera</b></a>
      </div>
      <div class="card-body" >
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="/loginproses" method="post">
        @csrf
          <div class="input-group mb-3">
            {{-- <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="username" placeholder="Username" autofocus> --}}
            <input type="username" class="form-control" name="username" placeholder="Username" autofocus>
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

    
        {{-- <p class="mb-0">
          <a href="/register" class="text-center"  style="color: rgb(237, 245, 242)"><b> Register a new membership</b></a>
        </p> --}}
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