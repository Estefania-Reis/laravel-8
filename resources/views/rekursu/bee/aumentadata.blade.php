@extends('layout.admin')

@section('content')

<body>
    <div class="wrapper mt-5">
{{-- <div class="col-auto">
    <a href="/rekursu/bee/index" class="btn btn-info"><i class="nav-icon fas fa-arrow-circle-left"></i> Kualidade Be'e</a>
</div> --}}
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size: 20px">
                            <strong>Adisiona Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insertdatabee" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Series/Kode</label><br>
                                    <select class="form-select" name="series_id" id="series_id" aria-label="Default select example">
                                        @foreach ($dataseries as $data)
                                            <option selected value="{{ $data->id }}">{{ $data->series }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="date" name="data" class="form-control" 
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Id Kolam</label><br>
                                    <select class="form-select" name="kolam_id" aria-label="Default select example">
                                        @foreach ($datakolam as $data)
                                            <option selected value="{{ $data->id_kolam }}">{{ $data->id_kolam }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Estatus Bee Dalan Tama</label>
                                    <input type="text" name="status_bee_dalan_tama" class="form-control" 
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Estatus Bee Dalan Sai</label>
                                    <input type="text" name="status_bee_dalan_sai" class="form-control" 
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Razaun</label>
                                    <input type="text" name="razaun" class="form-control" 
                                        aria-describedby="emailHelp">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">PH</label>
                                    <input type="text" name="ph" class="form-control" 
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Temperatura</label>
                                    <input type="text" name="temperatura" class="form-control" 
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">DO</label>
                                    <input type="text" name="do" class="form-control" 
                                        aria-describedby="emailHelp">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">SD</label>
                                    <input type="text" name="sd" class="form-control" 
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Orijem Bee</label><br>
                                    <select class="form-select" name="orijem_bee" aria-label="Default select example">
                                        {{-- <option selected>Hili Jerasaun</option> --}}
                                        <option selected value="bee moris">bee moris</option>
                                        <option value="pump">pump</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-info">Submete</button>
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