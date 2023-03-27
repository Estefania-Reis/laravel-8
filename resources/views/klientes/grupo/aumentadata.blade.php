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
                            <strong>
                                Adisiona Dadus
                            </strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insertdatagp" method="POST" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1" class="form-label">Naran Grupo</label>
                                    <input type="text" name="naran" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('naran')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Naran Kompletu Xefe Grupu</label>
                                    <input type="text" name="chefe_grupo" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('chefe_grupo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">No ID Eleitoral/BI</label>
                                    <input type="text" name="no_id_xefe" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('no_id_xefe')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Jeneru</label><br>
                                    <select class="form-select" name="jeneru" aria-label="Default select example">
                                        <option selected>Hili Jeneru</option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Municipio</label><br>
                                    <select class="form-select" name="r_munisipio" id="r_munisipio" aria-label="Default select example">
                                        <option selected> Hili... </option>
                                        @foreach ($datamunicipio as $data)
                                            <option value="{{ $data->id}}">{{ $data->naran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Posto</label><br>
                                    <select class="form-select" name="r_postu" id="r_postu" aria-label="Default select example">
                                        <option selected> Hili... </option>                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Suco</label><br>
                                    <select class="form-select" name="r_suku" id="r_suku" aria-label="Default select example">
                                        <option selected> Hili... </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Aldeia</label><br>
                                    <select class="form-select" name="r_aldeia" id="r_aldeia" aria-label="Default select example">
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
                            </div>
                                {{-- <div>
                                    <label for="">Rezidensia/Hela-Fatin</label><br>
                                </div> --}}
                            
                            {{-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Submete Foto Kartaun Eleitoral/BI</label>
                                <input type="file" name="foto_kartaun" class="form-control" >
                            </div>                          --}}
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
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $(function() {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function(){
            $('#r_munisipio').on('change', function(){
                let r_munisipio = $('#r_munisipio').val();
                $.ajax({
                    type: 'POST',
                    url : "{{ route('getPosto2') }}",
                    data: {municipio_id:r_munisipio},
                    cache : false,

                    success: function(msg){
                        $('#r_postu').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })

            $('#r_postu').on('change', function(){
                let r_postu = $('#r_postu').val();
                $.ajax({
                    type: 'POST',
                    url : "{{ route('getSuco2') }}",
                    data: {posto_id:r_postu},
                    cache : false,

                    success: function(msg){
                        $('#r_suku').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })

            $('#r_suku').on('change', function(){
                let r_suku = $('#r_suku').val();
                $.ajax({
                    type: 'POST',
                    url : "{{ route('getAldeia2') }}",
                    data: {suco_id:r_suku},
                    cache : false,

                    success: function(msg){
                        $('#r_aldeia').html(msg);
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