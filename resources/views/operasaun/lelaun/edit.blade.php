@extends('layout.admin')

@section('content')

<body>
    <div class="content-wrapper mt-5">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size: 20px">
                            <strong>Hadia Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="/updatedatalel/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Series</label><br>
                                    <select class="form-select" name="series_id" class="selectpicker" aria-label="Default select example">
                                        @foreach ($dataseries as $data)
                                            <option value="{{ $data->id }}">{{ $data->series }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan</label>
                                    <input type="text" name="total_ikan" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->total_ikan }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Presu/Pezu (Kg)</label>
                                    <input type="text" name="presukg" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->presukg }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data Loke Lelaun</label>
                                    <input type="date" name="data_loke_lelaun" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->data_loke_lelaun }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data Remata Lelaun</label>
                                    <input type="date" name="data_remata_lelaun" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->data_remata_lelaun }}">
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