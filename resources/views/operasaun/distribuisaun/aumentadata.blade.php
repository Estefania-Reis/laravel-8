@extends('layout.admin')

@section('content')

<body>
    <div class="wrapper">
    <h1 class="text-center mb-3 mt-5">Adisiona Dadus</h1>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdatadist" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-2 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Series/Kode</label><br>
                                    <select class="form-select" name="series_id" id="series_id" aria-label="Default select example">
                                        @foreach ($dataseries as $data)
                                            <option selected value="{{ $data->id }}">{{ $data->series }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="date" name="data" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('data')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            <div class="mb-3 col-3">
                                <label for="exampleInputEmail1" class="form-label">Id Kliente Individual</label><br>
                                <select class="form-select" name="klienteIndividual_id" aria-label="Default select example">
                                    <option selected value="0">Hili...</option>
                                    @foreach ($dataklienteind as $data)
                                        <option value="{{ $data->id_kliente }}">{{ $data->id_kliente }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-3">
                                <label for="exampleInputEmail1" class="form-label">Hili...</label><br>
                                <select class="form-select" name="klienteGrupo_id" aria-label="Default select example">
                                    <option selected value="0">Id Kliente Grupo</option>
                                    @foreach ($dataklientegp as $data)
                                        <option value="{{ $data->id_klientegrupo }}">{{ $data->id_klientegrupo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="exampleInputEmail1"class="form-label">Total M. Sex</label>
                                    <select class="form-select" onChange="total_msex(this.value)" aria-label="Default select example">
                                        <option value="0" selected>hili</option>
                                    @foreach ($dataikan as $data)
                                        <option value="{{ $data->total_ikan_oan }}">{{ $data->id_ikanoan }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="total_m_sex" class="form-control" id="total_m_sex"
                                    aria-describedby="emailHelp" value="0" readonly>
                                    @error('total_m_sex')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1"class="form-label">Total N. M. Sex</label>
                                    <select class="form-select" onChange="total_nsex(this.value)" aria-label="Default select example">
                                        <option value="0" selected>hili</option>
                                    @foreach ($dataikannur as $data)
                                        <option value="{{ $data->total_ikan_oan }}">{{ $data->id_ikannurseryn }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="total_n_sex" class="form-control" id="total_n_sex"
                                    aria-describedby="emailHelp" value="0" readonly>
                                    @error('total_n_sex')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Oan</label>
                                <input type="text" name="total_ikan_oan" class="form-control" id="total_ikan_oan"
                                    aria-describedby="emailHelp" value="0" readonly>
                                    @error('total_ikan_oan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Objetivu</label>
                                <input type="text" name="objetivu" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('objetivu')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1" class="form-label">Total Kolam</label>
                                <input type="text" name="total_kolam" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('total_kolam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1" class="form-label">Total Plastik</label>
                                <input type="text" name="total_plastik" class="form-control" id="total_plastik"
                                    aria-describedby="emailHelp" value="1">
                                    @error('total_plastik')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan/Plastik</label>
                                <input type="text" name="total_ikanplastik" class="form-control" id="total_ikanplastik"
                                    aria-describedby="emailHelp" value="0" readonly>
                                    @error('total_ikanplastik')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1" class="form-label">Proposta</label>
                                <input type="file" name="proposta" class="form-control" >
                            </div> 
                        </div>
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
    {{-- script jQuery for municipio select --}}
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
    <script>
        function total_msex(val){
            var t=val;
            document.getElementById("total_m_sex").value=t;
        }
    </script>
    <script>
        function total_nsex(val){
            var t=val;
            document.getElementById("total_n_sex").value=t;
        }
    </script>
    <script>
        $(document).on('blur','#total_ikan_oan', function(){
        let total_m_sex = parseFloat($('#total_m_sex').val())
        let total_n_sex = parseFloat($('#total_n_sex').val())
        let rezultadu = total_m_sex + total_n_sex
        $('#total_ikan_oan').val(rezultadu)
    })
    $(document).on('blur','#total_n_sex', function(){
        let total_m_sex = parseFloat($('#total_m_sex').val())
        let total_n_sex = parseFloat($('#total_n_sex').val())
        let rezultadu = total_m_sex + total_n_sex 
        $('#total_ikan_oan').val(rezultadu)
    })
    $(document).on('blur','#total_m_sex', function(){
        let total_m_sex = parseFloat($('#total_m_sex').val())
        let total_n_sex = parseFloat($('#total_n_sex').val())
        let rezultadu = total_m_sex + total_n_sex
        $('#total_ikan_oan').val(rezultadu)
    })
    </script>
    <script>
        $(document).on('blur','#total_ikanplastik', function(){
        let total_ikan_oan = parseFloat($('#total_ikan_oan').val())
        let total_plastik = parseFloat($('#total_plastik').val())
        let rezultadu = total_ikan_oan / total_plastik
        $('#total_ikanplastik').val(rezultadu)
    })
    $(document).on('blur','#total_plastik', function(){
        let total_ikan_oan = parseFloat($('#total_ikan_oan').val())
        let total_plastik = parseFloat($('#total_plastik').val())
        let rezultadu = total_ikan_oan / total_plastik 
        $('#total_ikanplastik').val(rezultadu)
    })
    $(document).on('blur','#total_ikan_oan', function(){
        let total_ikan_oan = parseFloat($('#total_ikan_oan').val())
        let total_plastik = parseFloat($('#total_plastik').val())
        let rezultadu = total_ikan_oan / total_plastik
        $('#total_ikanplastik').val(rezultadu)
    })
    </script>
</body>

@endsection