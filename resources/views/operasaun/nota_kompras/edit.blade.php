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
                    <form action="/updatenota/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-2 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Series</label><br>
                                    <select class="form-select" name="series_id" class="selectpicker" aria-label="Default select example">
                                        @foreach ($dataseries as $datas)
                                        @if (old('series_id', $data->series_id) == $datas->id)
                                        <option selected value="{{ $datas->id }}">{{ $datas->series }}</option>
                                        @else
                                        <option value="{{ $datas->id }}">{{ $datas->series }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="text" name="data" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ date('j-n-Y', strtotime($data->data)) }}">
                                </div>
                                <div class="col-2 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Lelaun</label><br>
                                    <select class="form-select" name="lelaun_id" class="selectpicker" aria-label="Default select example">
                                        @foreach ($datalelaun as $datale)
                                        @if (old('lelaun_id', $data->lelaun_id) == $datale->id_lelaun)
                                        <option selected value="{{ $datale->id_lelaun }}">{{ $datale->id_lelaun }}</option>
                                        @else
                                        <option value="{{ $datale->id_lelaun }}">{{ $datale->id_lelaun }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No Eleitoral (Opsaun)</label>
                                    <input type="text" name="no_eleitoral" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->no_eleitoral }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No BI (Opsaun)</label>
                                    <input type="text" name="no_bi" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->no_bi }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Naran Komprador</label>
                                    <input type="text" name="naran_kliente" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->naran_kliente }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pezu (Kg)</label>
                                    <input type="text" name="peso" class="form-control" id="peso"
                                        aria-describedby="emailHelp" value="{{ $data->peso }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Presu/Pezu</label>
                                    <input type="text" name="presu" class="form-control" id="presu"
                                        aria-describedby="emailHelp" value="{{ $data->presu }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Pagamentu</label>
                                    <input type="text" name="total" class="form-control" id="total"
                                        aria-describedby="emailHelp" value="{{ $data->total }}">
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
    
    <script>
        $(document).on('blur','#total', function(){
        let peso = parseFloat($('#peso').val())
        let presu = parseFloat($('#presu').val())
        let rezultadu = peso * presu
        $('#total').val(rezultadu)
    })
    $(document).on('blur','#presu', function(){
        let peso = parseFloat($('#peso').val())
        let presu = parseFloat($('#presu').val())
        let rezultadu = peso * presu 
        $('#total').val(rezultadu)
    })
    $(document).on('blur','#peso', function(){
        let peso = parseFloat($('#peso').val())
        let presu = parseFloat($('#presu').val())
        let rezultadu = peso * presu
        $('#total').val(rezultadu)
    })
    </script>

</body>

@endsection