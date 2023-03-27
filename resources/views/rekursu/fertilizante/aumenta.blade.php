@extends('layout.admin')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                        <form action="/insertfertilizante" method="POST" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1" class="form-label">Naran</label>
                                    <input type="text" name="naran" class="form-control" id="naran"
                                        aria-describedby="emailHelp">
                                        @error('naran')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Total Saka</label>
                                    <input type="text" name="total_saka" class="form-control" id="total_saka"
                                        aria-describedby="emailHelp" value="0">
                                        @error('total_saka')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Pezu/Saka</label>
                                    <input type="text" name="total_kgsaka" class="form-control" id="total_kgsaka"
                                        aria-describedby="emailHelp" value="0">
                                        @error('total_kgsaka')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Presu/saka</label>
                                    <input type="text" name="presusaka" class="form-control" id="presusaka"
                                        aria-describedby="emailHelp" value="0">
                                        @error('presusaka')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Total Presu</label>
                                    <input type="text" name="total_presu" class="form-control" id="total_presu"
                                        aria-describedby="emailHelp" value="0">
                                        @error('total_presu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data Importasaun</label>
                                    <input type="date" name="data_import" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('data_import')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data Expira</label>
                                    <input type="date" name="data_expire" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('data_expire')
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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    {{-- script jQuery for municipio select --}}
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $(document).on('blur','#total_presu', function(){
        let total_saka = parseFloat($('#total_saka').val())
        let presusaka = parseFloat($('#presusaka').val())
        let rezultadu = total_saka * presusaka
        $('#total_presu').val(rezultadu)
    })
    $(document).on('blur','#presusaka', function(){
        let total_saka = parseFloat($('#total_saka').val())
        let presusaka = parseFloat($('#presusaka').val())
        let rezultadu = total_saka * presusaka 
        $('#total_presu').val(rezultadu)
    })
    $(document).on('blur','#total_saka', function(){
        let total_saka = parseFloat($('#total_saka').val())
        let presusaka = parseFloat($('#presusaka').val())
        let rezultadu = total_saka * presusaka
        $('#total_presu').val(rezultadu)
    })
    </script>
</body>

@endsection