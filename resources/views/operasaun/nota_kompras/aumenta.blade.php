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
                        <form action="/insertnota" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-2 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Series</label><br>
                                    <select class="form-select" name="series_id" class="selectpicker" aria-label="Default select example">
                                        @foreach ($dataseries as $data)
                                            <option value="{{ $data->id }}">{{ $data->series }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="date" name="data" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('data')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-2 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Lelaun</label><br>
                                    <select class="form-select" name="series_id" class="selectpicker" aria-label="Default select example">
                                        @foreach ($datalelaun as $data)
                                            <option value="{{ $data->id_lelaun }}">{{ $data->id_lelaun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No Eleitoral (Opsaun)</label>
                                    <input type="text" name="no_eleitoral" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('no_eleitoral')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No BI (Opsaun)</label>
                                    <input type="text" name="no_bi" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('no_bi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Naran Komprador</label>
                                    <input type="text" name="naran_kliente" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('naran_kliente')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pezu (Kg)</label>
                                    <input type="text" name="peso" class="form-control" id="peso"
                                        aria-describedby="emailHelp" value="0">
                                        @error('peso')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Presu/Pezu</label>
                                    <input type="text" name="presu" class="form-control" id="presu"
                                        aria-describedby="emailHelp" value="0">
                                        @error('presu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Pagamentu</label>
                                    <input type="text" name="total" class="form-control" id="total"
                                        aria-describedby="emailHelp" value="0">
                                        @error('total')
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

    {{-- script below is for selecpicker from bootstrap version 4 --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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