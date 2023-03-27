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
                            <strong>
                                Adisiona Dadus
                            </strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insertikannurseryn" method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1" class="form-label">Data</label>
                                <input type="date" name="data" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Priense data expire YYYY">
                                    @error('data')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Kolam Nursery</label><br>
                                <select class="form-select" name="kolam_id" aria-label="Default select example">
                                    @foreach ($datakolam as $data)
                                        <option selected value="{{ $data->id_kolam }}">{{ $data->id_kolam }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Hapa</label><br>
                                <select class="form-select" name="hapa_id" aria-label="Default select example">
                                    @foreach ($datahapa as $data)
                                        <option selected value="{{ $data->id_hapa }}">{{ $data->id_hapa }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Oan</label><br>
                                <input type="text" name="total_ikan_oan" class="form-control" id="total_ikan_oan"
                                    aria-describedby="emailHelp">
                                    @error('total_ikan_oan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Adisiona Ikan Oan</label><br>
                                <input type="text" name="adisiona_ikan_oan" class="form-control" id="adisiona_ikan_oan"
                                    aria-describedby="emailHelp" value="0">
                                    @error('adisiona_ikan_oan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>  
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Tipu Diminuisaun</label> <br>
                                <select name="tipu_dim" id="tipu_dim">
                                    <option value="" selected>Hili...</option>
                                    <option value="distribui">distribui</option>
                                    <option value="mate">mate</option>
                                </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Razaun Diminuisaun</label>
                                <input type="text" name="razaun_dim" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                                @error('razaun_dim')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Diminuisaun</label>
                                <input type="text" name="total_dim" class="form-control" id="total_dim"
                                aria-describedby="emailHelp" value="0">
                                @error('total_dim')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Kliente Individual</label><br>
                                <select class="form-select" name="klienteIndividual_id" aria-label="Default select example">
                                    <option selected value="">Hili...</option>
                                    @foreach ($dataklienteind as $data)
                                        <option value="{{ $data->id_kliente }}">{{ $data->id_kliente }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Kliente Grupo</label><br>
                                <select class="form-select" name="klienteGrupo_id" aria-label="Default select example">
                                    <option selected value="">Hili...</option>
                                    @foreach ($dataklientegp as $data)
                                        <option value="{{ $data->id_klientegrupo }}">{{ $data->id_klientegrupo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Plastiku M. Sex</label>
                                <input type="text" name="total_plastik_msex" class="form-control" id="total_plastik_msex"
                                aria-describedby="emailHelp" value="0">
                                @error('total_plastik_msex')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Plastiku N. M. Sex</label>
                                <input type="text" name="total_plastik_nmsex" class="form-control" id="total_plastik_nmsex"
                                aria-describedby="emailHelp" value="0">
                                @error('total_plastik_nmsex')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Ikan/Plastiku M. Sex</label>
                                <input type="text" name="total_ikanplastik_msex" class="form-control" id="total_ikanplastik_msex"
                                aria-describedby="emailHelp" value="0">
                                @error('total_ikanplastik_msex')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Ikan/Plastiku N. M. Sex</label>
                                <input type="text" name="total_ikanplastik_nmsex" class="form-control" id="total_ikanplastik_nmsex"
                                aria-describedby="emailHelp" value="0">
                                @error('total_ikanplastik_nmsex')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Ikan Oan M. Sex Atual</label>
                                <input type="text" name="total_ikan_oan_msex_atual" class="form-control" id="total_ikan_oan_msex_atual"
                                aria-describedby="emailHelp" readonly value="0">
                                @error('total_ikan_oan_msex_atual')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>  
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Ikan Oan N. M. Sex Atual</label>
                                <input type="text" name="total_ikan_oan_nmsex_atual" class="form-control" id="total_ikan_oan_nmsex_atual"
                                aria-describedby="emailHelp" readonly value="0">
                                @error('total_ikan_oan_nmsex_atual')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>           
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    {{-- kalkula total ikan atual --}}
    <script>
        $(document).on('blur','#total_ikan_oan_atual', function(){
        let total_ikan_oan = parseFloat($('#total_ikan_oan').val())
        let adisiona_ikan_oan = parseFloat($('#adisiona_ikan_oan').val())
        let total_dim = parseFloat($('#total_dim').val())
        let rezultadu =  total_ikan_oan + adisiona_ikan_oan - total_dim
        $('#total_ikan_oan_atual').val(rezultadu)
    })
    $(document).on('blur','#total_ikan_oan', function(){
        let total_ikan_oan = parseFloat($('#total_ikan_oan').val())
        let adisiona_ikan_oan = parseFloat($('#adisiona_ikan_oan').val())
        let total_dim = parseFloat($('#total_dim').val())
        let rezultadu =  total_ikan_oan + adisiona_ikan_oan - total_dim
        $('#total_ikan_oan_atual').val(rezultadu)
    })
    $(document).on('blur','#adisiona_ikan_oan', function(){
        let total_ikan_oan = parseFloat($('#total_ikan_oan').val())
        let adisiona_ikan_oan = parseFloat($('#adisiona_ikan_oan').val())
        let total_dim = parseFloat($('#total_dim').val())
        let rezultadu =  total_ikan_oan + adisiona_ikan_oan - total_dim
        $('#total_ikan_oan_atual').val(rezultadu)
    })
    $(document).on('blur','#total_dim', function(){
        let total_ikan_oan = parseFloat($('#total_ikan_oan').val())
        let adisiona_ikan_oan = parseFloat($('#adisiona_ikan_oan').val())
        let total_dim = parseFloat($('#total_dim').val())
        let rezultadu =  total_ikan_oan + adisiona_ikan_oan - total_dim
        $('#total_ikan_oan_atual').val(rezultadu)
    })
    </script>
    {{-- kalkula ikan/plastiku --}}
     <script>
        $(document).on('blur','#total_ikanplastik', function(){
        let total_ikan_oan  = parseFloat($('#total_ikan_oan').val())
        let total_plastik   = parseFloat($('#total_plastik').val())
        let rezultadu       =  total_ikan_oan / total_plastik 
        $('#total_ikanplastik').val(rezultadu)
    })
    $(document).on('blur','#total_ikan_oan', function(){
        let total_ikan_oan  = parseFloat($('#total_ikan_oan').val())
        let total_plastik   = parseFloat($('#total_plastik').val())
        let rezultadu       =  total_ikan_oan / total_plastik 
        $('#total_ikanplastik').val(rezultadu)
    })
    $(document).on('blur','#total_plastik', function(){
        let total_ikan_oan  = parseFloat($('#total_ikan_oan').val())
        let total_plastik   = parseFloat($('#total_plastik').val())
        let rezultadu       =  total_ikan_oan / total_plastik 
        $('#total_ikanplastik').val(rezultadu)
    })
    </script>
</body>

@endsection