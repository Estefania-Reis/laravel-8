@extends('layout.admin')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<body>
<div class="content-wrapper">
    {{-- <h1 class="text-center m-2">Adisiona Dadus</h1> --}}
    <div class="container mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size: 20px">
                            <strong>Adisiona Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insertdataind" method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1" class="form-label">Naran Kompletu</label>
                                <input type="text" name="naran" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('naran')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data Moris</label>
                                <input type="date" name="data_moris" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('data_moris')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Jeneru</label> <br>
                                <select class="form-select" name="genero" aria-label="Default select example">
                                    <option selected>Hili</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Naturalidade</label> <br>
                                <select class="form-select" name="naturalidade" aria-label="Default select example">
                                    <option selected> Hili... </option>
                                    @foreach ($datamunicipio as $data)
                                        <option value="{{ $data->naran }}">{{ $data->naran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Municipio</label> <br>
                                <select class="form-select" name="municipio_id" id="municipio_id" aria-label="Default select example">
                                    <option selected> Hili... </option>
                                    @foreach ($datamunicipio as $data)
                                        <option value="{{ $data->id}}">{{ $data->naran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Posto Administrativo</label> <br>
                                <select class="form-select" name="posto_id" id="posto_id" aria-label="Default select example">
                                    <option selected> Hili... </option>                                        
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Suco</label> <br>
                                <select class="form-select" name="suco_id" id="suco_id" aria-label="Default select example">
                                    <option selected> Hili... </option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Aldeia</label> <br>
                                <select class="form-select" name="aldeia_id" id="aldeia_id" aria-label="Default select example">
                                    <option selected> Hili... </option>
                                </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Numeru Telemovel</label>
                                <input type="text" name="nmr_telfone" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('nmr_telefone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Submete Foto</label>
                                <input type="file" name="foto" class="form-control" >
                            </div> 
                        </div> 
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
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $(function() {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function(){
            $('#municipio_id').on('change', function(){
                let municipio_id = $('#municipio_id').val();
                $.ajax({
                    type: 'POST',
                    url : "{{ route('getPosto1') }}",
                    data: {municipio_id:municipio_id},
                    cache : false,

                    success: function(msg){
                        $('#posto_id').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })

            $('#posto_id').on('change', function(){
                let posto_id = $('#posto_id').val();
                $.ajax({
                    type: 'POST',
                    url : "{{ route('getSuco1') }}",
                    data: {posto_id:posto_id},
                    cache : false,

                    success: function(msg){
                        $('#suco_id').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })

            $('#suco_id').on('change', function(){
                let suco_id = $('#suco_id').val();
                $.ajax({
                    type: 'POST',
                    url : "{{ route('getAldeia1') }}",
                    data: {suco_id:suco_id},
                    cache : false,

                    success: function(msg){
                        $('#aldeia_id').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })

        })
    </script>
</body>

@endsection