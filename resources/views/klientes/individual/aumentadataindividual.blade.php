@extends('layout.admin')

@section('content')
<body>
<br>
    <h1 class="text-center mb-3 mt-5">Adisiona Dadus</h1>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdataind" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Naran Kompletu</label>
                                <input type="text" name="naran" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('naran')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jeneru</label>
                                <select class="form-select" name="genero" aria-label="Default select example">
                                    <option selected>Hili Jeneru</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Data Moris</label>
                                <input type="date" name="data_moris" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('data_moris')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Naturalidade</label>
                                <input type="text" name="naturalidade" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('naturalidade')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Aldeia</label>
                                <select class="form-select" name="aldeia_id" aria-label="Default select example">
                                    <option selected>Aldeia</option>
                                    @foreach ($dataaldeia as $data)
                                        <option value="{{ $data->id }}">{{ $data->naran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Suco</label>
                                <select class="form-select" name="suco_id" aria-label="Default select example">
                                    <option selected>Suco</option>
                                    @foreach ($datasuco as $data)
                                        <option value="{{ $data->id }}">{{ $data->naran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Posto</label>
                                <select class="form-select" name="posto_id" aria-label="Default select example">
                                    <option selected>Posto</option>
                                    @foreach ($dataposto as $data)
                                        <option value="{{ $data->id }}">{{ $data->naran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Municipio</label>
                                <select class="form-select" name="municipio_id" aria-label="Default select example">
                                    <option selected>Municipio</option>
                                    @foreach ($datamunicipio as $data)
                                        <option value="{{ $data->id }}">{{ $data->naran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Numeru Telemovel</label>
                                <input type="text" name="nmr_telfone" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('nmr_telefone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Submete Foto</label>
                                <input type="file" name="foto" class="form-control" >
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