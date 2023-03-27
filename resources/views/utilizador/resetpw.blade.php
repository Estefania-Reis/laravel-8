@extends('layout.admin')

@section('content')

<body>
    <div class="wrapper">
    <div class="container"><br><br><br>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center">
                            <strong>Reset Password</strong>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="/update-pw/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf                         
                           <div class="form-row">
                            
                            {{-- <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Email: {{ $data->email }}</label>
                            </div> --}}

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" value="{{($data->password) }}">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-unlock"></span>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                        </div>
                    </div>
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
</body>

@endsection