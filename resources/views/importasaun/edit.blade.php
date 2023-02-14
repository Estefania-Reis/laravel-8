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
                        <form action="/update_importasaun_fini/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data Importasaun</label>
                                <input type="text" name="data" class="form-control" id="data"
                                    aria-describedby="emailHelp" value="{{ date('j-n-Y ', strtotime($data->data)) }}">
                                    @error('data')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Tipu Ikan</label>
                                <input type="text" name="tipu" class="form-control" id="tipu"
                                    aria-describedby="emailHelp" value="{{ $data->tipu }}">
                                    @error('tipu')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Nasaun</label>
                                <input type="text" name="nasaun" class="form-control" id="nasaun"
                                    aria-describedby="emailHelp" value="{{ $data->nasaun }}">
                                    @error('nasaun')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total M. Sex</label>
                                <input type="text" name="total_msex" class="form-control" id="total_msex"
                                    aria-describedby="emailHelp" value="{{ $data->total_msex }}">
                                    @error('total_msex')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total N. M. Sex</label>
                                <input type="text" name="total_nmsex" class="form-control" id="total_nmsex"
                                    aria-describedby="emailHelp" value="{{ $data->total_nmsex }}">
                                    @error('total_msex')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div> 
                    </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
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