@extends('layout.admin')
@section('content')

<body>
    <div class="wrapper mt-5">
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
                        <form action="/insertdatalel" method="POST" enctype="multipart/form-data">
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
                                <div class="mb-3 col-4">
                                    <label for="exampleInputEmail1"class="form-label">Id Ikan </label>
                                        <select class="form-select" onChange="total_atual(this.value)" aria-label="Default select example">
                                            <option value="0" selected>hili</option>
                                        @foreach ($dataikan as $data)
                                            <option value="{{ $data->total_atual }}">{{ $data->id_ikanbrood }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="total_ikan" class="form-control" id="total_ikan"
                                        aria-describedby="emailHelp" value="0" readonly>
                                        @error('total_ikan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Presu/Pezu (Kg)</label>
                                    <input type="text" name="presukg" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('presukg')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data Loke Lelaun</label>
                                    <input type="date" name="data_loke_lelaun" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('data_loke_lelaun')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data Remata Lelaun</label>
                                    <input type="date" name="data_remata_lelaun" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('data_remata_lelaun')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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

    
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
    <script>
        function total_atual(val){
            var t=val;
            document.getElementById("total_ikan").value=t;
        }
    </script>

</body>

@endsection