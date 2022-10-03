@extends('layout.admin')

@section('content')
<body>
<br>
    <h1 class="text-center mb-5 mt-5">Adisiona Dadus Ikan</h1>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdataioan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Id Ikan Tolun</label>
                                <select class="form-select" name="ikan_tolun_id" aria-label="Default select example">
                                    @foreach ($dataikantolun as $data)
                                        <option selected value="{{ $data->id }}">{{ $data->id }}</option>
                                    @endforeach
                                </select>
                            </div>                    
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Oan</label>
                                <input type="text" name="kuantidade" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('kuantidade')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Id Kolam Nursery</label>
                                <select class="form-select" name="kolam_nursery_id" aria-label="Default select example">
                                    @foreach ($datakolam as $data)
                                        <option selected value="{{ $data->id }}">{{ $data->id }}</option>
                                    @endforeach
                                </select>
                            </div>            
                          <button type="submit" class="btn btn-primary">Submete</button>
                        </form>
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