@extends('layout.admin')
@push('css')
      {{-- selectpicker from bpootstrap 4 --}}
 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  --}}
 {{-- integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
@endpush
@section('content')

<body>
  <div class="wrapper">
    
    <div class="container mb-5"><br>
        <div class="row justify-content-center">
            <div class="col-auto">
              <div class="login-box mt-5 ">
                <!-- /.login-logo -->
                <div class="card" >
                  {{-- <div class="card-header text-center" style="background-color: transparent; color: rgb(251, 255, 251); box-shadow: 0 5px 30px rgb(236, 226, 226);">
                    <a href="../../index2.html" class="h1 embed-responsive"><b>Pescas e Aquicultura</b></a>
                  </div> --}}
                  <div class="card-header">
                    <div class="vertical-center">
                      <strong>Rejistu Utilizador</strong>
                    </div>
                  </div>
                  <div class="card-body" >
                    
                    <form action="/registeruser" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="username" class="form-control" name="username" placeholder="Username">
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
                      
                    <!-- /.social-auth-links -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    
                      <!-- /.col -->
                      <div class="vertical-center">
                        <button type="submit" class="btn btn-info ">Submit</button>
                      </div>
                  </form> 
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>
        </div>
    </div>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <script>
      @if (Session:: has('success'))
      toastr.success("{{ Session::get('success') }}")
      @endif
    </script>
</body>

@endsection
@push('script')

@endpush