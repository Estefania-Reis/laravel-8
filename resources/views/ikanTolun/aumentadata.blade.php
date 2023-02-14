@extends('layout.admin')

@section('content')
<body>
    <div class="content-wrapper mt-5">
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
                        <form action="/insertdataikantolun" method="POST" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1" class="form-label">Id Funcionario</label><br>
                                    <select class="form-select" name="staff_id" aria-label="Default select example">
                                        @foreach ($dataidfun as $data)
                                            <option selected value="{{ $data->id }}">{{ $data->id_employee }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Id Ikan</label><br>
                                    <select class="form-select" name="ikan_id" aria-label="Default select example">
                                        @foreach ($dataidikan as $data)
                                            <option selected value="{{ $data->id_ikanbrood }}">{{ $data->id_ikanbrood }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                                {{-- <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Kolam</label><br>
                                    <select class="form-select" name="kolam_id" aria-label="Default select example">
                                        @foreach ($dataidkolam as $data)
                                            <option selected value="{{ $data->id_kolam }}">{{ $data->id_kolam }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Hapa</label><br>
                                    <select class="form-select" name="hapa_id" aria-label="Default select example">
                                        @foreach ($dataidhapa as $data)
                                            <option selected value="{{ $data->id_hapa }}">{{ $data->id_hapa }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Data Kolleta</label>
                                        <input type="date" name="data_kolleta" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Priense data expire YYYY">
                                            @error('data_kolleta')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Inan</label>
                                    <input type="text" name="total_ikan_F" class="form-control" id="total_ikan_F" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Tolun</label>
                                <input type="text" name="total_ikan_tolun" class="form-control" id="total_ikan_tolun" >
                            </div>    
                            </div>
                            {{-- <div class="row"> --}}
                                
                            {{-- <div class="mb-3 mr-3">
                                <label for="exampleInputEmail1" class="form-label">Id Incubator</label><br>
                                <select class="form-select" name="incubator_id" aria-label="Default select example">
                                    @foreach ($dataidincu as $data)
                                        <option selected value="{{ $data->id_incubator }}">{{ $data->id_incubator }}</option>
                                    @endforeach
                                </select>
                            </div>  --}}
                            {{-- </div>    --}}
                            
                    </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-primary">Submete</button>
                        </div>
                    </form>
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