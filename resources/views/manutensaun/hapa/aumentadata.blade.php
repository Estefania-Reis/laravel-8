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
                        <form action="/insertdatahapa" method="POST" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1" class="form-label">Id Kolam</label> <br>
                                    <select class="form-select" name="kolam_id" aria-label="Default select example">
                                        @foreach ($datakolam as $data)
                                            <option selected value="{{ $data->id_kolam }}">{{ $data->id_kolam}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Tipu Hapa</label> <br>
                                    <select class="form-select" name="tipu_hapa" aria-label="Default select example">
                                        <option selected value="">Hili</option>
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
                                        aria-describedby="emailHelp" value=0>
                                        @error('comprimento')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Largura (m)</label>
                                    <input type="text" name="largura" class="form-control" id="largura"
                                        aria-describedby="emailHelp" value=0>
                                        @error('largura')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Area (m kuadradu)</label>
                                    <input type="text" name="area" class="form-control" id="area"
                                        aria-describedby="emailHelp" value=0>
                                        @error('area')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Altura (m)</label>
                                    <input type="text" name="altura" class="form-control" id="altura"
                                        aria-describedby="emailHelp" value=0>
                                        @error('altura')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Volume (m kubiku)</label>
                                    <input type="text" name="volume" class="form-control" id="volume"
                                        aria-describedby="emailHelp" readonly>
                                        {{-- @error('volume')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror --}}
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Status Hapa</label> <br>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected>Hili</option>
                                        <option value="Diak">Diak</option>
                                        <option value="Aat">Aat</option>
                                        <option value="Aatgrave">Aat Grave</option>
                                        <option value="Manutensaun">Manutensaun</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group b-3">
                                <label for="exampleInputEmail1" class="form-label">Observasaun</label>
                                <input type="text" name="obs" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Deskreve Kondisaun Status Kolam Nian" style="color: black">
                                    @error('obs')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-info">Submete</button>
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

    {{-- script below is for selecpicker from bootstrap version 4 --}}
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