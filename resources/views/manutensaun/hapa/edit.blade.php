@extends('layout.admin')

@section('content')

<body>
    <div class="wrapper">
    <h1 class="text-center mb-4">Edit Dadus</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updatedatahapa/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Series/Kode</label><br>
                                    <select class="form-select" name="series_id" id="series_id" aria-label="Default select example">
                                        @foreach ($dataseries as $datas)
                                        @if (old('series_id', $data->series_id) == $datas->id)
                                        <option selected value="{{ $datas->id }}">{{ $datas->series }}</option>
                                        @else
                                        <option value="{{ $datas->id }}">{{ $datas->series }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Id Kolam</label> <br>
                                    <select class="form-select" name="kolam_id" aria-label="Default select example">
                                        @foreach ($datakolam as $datak)
                                        @if (old('kolam_id', $data->kolam_id) == $datak->id_kolam)
                                        <option selected value="{{ $datak->id_kolam }}">{{ $datak->id_kolam}}</option>
                                        @else
                                        <option value="{{ $datak->id_kolam }}">{{ $datak->id_kolam}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Tipu Hapa</label> <br>
                                    <select class="form-select" name="tipu_hapa" aria-label="Default select example">
                                        <option selected value="{{ $data->tipu_hapa }}">{{ $data->tipu_hapa }}</option>
                                        <option value="L">L</option>
                                        <option value="M">M</option>
                                        <option value="S">S</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Comprimento (m)</label>
                                    <input type="text" name="comprimento" class="form-control" id="comprimento"
                                        aria-describedby="emailHelp" value="{{ $data->comprimento }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Largura (m)</label>
                                    <input type="text" name="largura" class="form-control" id="largura"
                                        aria-describedby="emailHelp" value="{{ $data->largura }}">
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Area (m kuadradu)</label>
                                    <input type="text" name="area" class="form-control" id="area"
                                        aria-describedby="emailHelp" value="{{ $data->area }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Altura (m)</label>
                                    <input type="text" name="altura" class="form-control" id="altura"
                                        aria-describedby="emailHelp" value="{{ $data->altura }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Volume (m kubiku)</label>
                                    <input type="text" name="volume" class="form-control" id="volume"
                                        aria-describedby="emailHelp" readonly value="{{ $data->volume }}">
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Status Hapa</label> <br>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected value="{{ $data->status }}">{{ $data->status }}</option>
                                        <option value="Diak">Diak</option>
                                        <option value="Aat">Aat</option>
                                        <option value="Aatgrave">Aat Grave</option>
                                        <option value="Manutensaun">Manutensaun</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Observasaun</label>
                                <input type="text" name="obs" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->obs }}">
                            </div>
                                         
                            <button type="submit" class="btn btn-info">Submete</button>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).on('blur','#area', function(){
            let comprimento = parseFloat($('#comprimento').val())
            let largura = parseFloat($('#largura').val())
            let rezultadu = comprimento * largura
            $('#area').val(rezultadu)
        })
        $(document).on('blur','#largura', function(){
            let comprimento = parseFloat($('#comprimento').val())
            let largura = parseFloat($('#largura').val())
            let rezultadu = comprimento * largura 
            $('#area').val(rezultadu)
        })
        $(document).on('blur','#comprimento', function(){
            let comprimento = parseFloat($('#comprimento').val())
            let largura = parseFloat($('#largura').val())
            let rezultadu = comprimento * largura
            $('#area').val(rezultadu)
        })
    
        $(document).on('blur','#volume', function(){
            let area = parseFloat($('#area').val())
            let altura = parseFloat($('#altura').val())
            let rezultadu = area * altura 
            $('#volume').val(rezultadu)
        })
    
        $(document).on('blur','#area', function(){
            let area = parseFloat($('#area').val())
            let altura = parseFloat($('#altura').val())
            let rezultadu = area * altura
            $('#volume').val(rezultadu)
        })
            
        $(document).on('blur','#altura', function(){
            let area = parseFloat($('#area').val())
            let altura = parseFloat($('#altura').val())
            let rezultadu = area * altura
            $('#volume').val(rezultadu)
        })
    
    </script>
</body>

@endsection