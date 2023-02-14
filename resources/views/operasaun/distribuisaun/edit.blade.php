@extends('layout.admin')

@section('content')

<body>
    <div class="content-wrapper">
    <h1 class="text-center mb-4">Hadia Dadus</h1>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                    <form action="/updatedatadist/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-2 mb-3">
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
                                <div class="mb-3 col-3">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="date" name="data" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->data }}">
                                </div>
                            <div class="mb-3 col-3">
                                <label for="exampleInputEmail1" class="form-label">Id Kliente Individual</label><br>
                                <select class="form-select" name="klienteIndividual_id" aria-label="Default select example">
                                    <option  value="0">Hili...</option>
                                    @foreach ($dataklienteind as $datak)
                                    @if (old('klienteIndividual_id', $data->klienteIndividual_id) == $datak->id_kliente)
                                    <option selected value="{{ $datak->id_kliente }}">{{ $datak->id_kliente }}</option>
                                    @else
                                    <option value="{{ $datak->id_kliente }}">{{ $datak->id_kliente }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-3">
                                <label for="exampleInputEmail1" class="form-label">Id Kliente Grupo</label><br>
                                <select class="form-select" name="klienteGrupo_id" aria-label="Default select example">
                                    <option value="0">Hili...</option>
                                    @foreach ($dataklientegp as $datakg)
                                    @if (old('klienteGrupo_id', $data->klienteGrupo_id) == $datakg->id_klientegrupo)
                                    <option selected value="{{ $datakg->id }}">{{ $datakg->id_klientegrupo }}</option>
                                    @else
                                    <option value="{{ $datakg->id }}">{{ $datakg->id_klientegrupo }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Id Ikan Nursery</label><br>
                                <select class="form-select" name="nursery_id" id="nursery_id" aria-label="Default select example">
                                    @foreach ($dataikan as $dataik)
                                    @if (old('nursery_id', $data->nursery_id) == $dataik->id_ikanoan)
                                    <option selected value="{{ $dataik->id_ikanoan }}">{{ $dataik->id_ikanoan }}</option>
                                    @else
                                    <option value="{{ $dataik->id_ikanoan }}">{{ $dataik->id_ikanoan }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="exampleInputEmail1"class="form-label">Total M. Sex</label>
                                    <select class="form-select" name="nursery_id" onChange="total_msex(this.value)" aria-label="Default select example">
                                        <option value="0">hili</option>
                                    @foreach ($dataikan as $datai)
                                    @if (old('nursery_id', $data->nursery_id) == $datai->id_ikanoan)
                                    <option selected value="{{ $datai->total_ikan_oan }}">{{ $datai->id_ikanoan }}</option>
                                    @else
                                    <option value="{{ $datai->total_ikan_oan }}">{{ $datai->id_ikanoan }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <input type="text" name="total_m_sex" class="form-control" id="total_m_sex"
                                    aria-describedby="emailHelp" value="{{ $data->total_m_sex }}" readonly>
                            </div>
                            <div class="col-2 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Id Ikan Nursery N. M. Sex</label><br>
                                <select class="form-select" name="nurseryn_id" id="nurseryn_id" aria-label="Default select example">
                                    @foreach ($dataikannur as $datasikn)
                                    @if (old('nurseryn_id', $data->nurseryn_id) == $dataikn->id_ikannurseryn)
                                    <option selected value="{{ $dataikn->id_ikannurseryn }}">{{ $dataikn->id_ikannurseryn }}</option>
                                    @else
                                    <option value="{{ $dataikn->id_ikannurseryn }}">{{ $dataikn->id_ikannurseryn }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1"class="form-label">Total N. M. Sex</label>
                                    <select class="form-select" name="nurseryn_id" onChange="total_nsex(this.value)" aria-label="Default select example">
                                        <option value="0">hili</option>
                                    @foreach ($dataikannur as $dataiknr)
                                    @if (old('nurseryn_id', $data->nurseryn_id) == $dataiknr->id_ikannurseryn)
                                    <option selected value="{{ $dataiknr->total_ikan_oan }}">{{ $dataiknr->id_ikannurseryn }}</option>
                                    @else
                                    <option value="{{ $dataiknr->total_ikan_oan }}">{{ $dataiknr->id_ikannurseryn }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <input type="text" name="total_n_sex" class="form-control" id="total_n_sex"
                                    aria-describedby="emailHelp" value="{{ $data->total_n_sex }}" readonly>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Oan</label>
                                <input type="text" name="total_ikan_oan" class="form-control" id="total_ikan_oan"
                                    aria-describedby="emailHelp" value="{{ $data->total_ikan_oan }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Objetivu</label>
                                <input type="text" name="objetivu" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->objetivu }}">
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1" class="form-label">Total Kolam</label>
                                <input type="text" name="total_kolam" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->total_kolam }}">
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1" class="form-label">Total Plastik</label>
                                <input type="text" name="total_plastik" class="form-control" id="total_plastik"
                                    aria-describedby="emailHelp" value="{{ $data->total_plastik }}">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan/Plastik</label>
                                <input type="text" name="total_ikanplastik" class="form-control" id="total_ikanplastik"
                                    aria-describedby="emailHelp" value="{{ $data->total_ikanplastik }}" readonly>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="exampleInputEmail1" class="form-label">Proposta</label>
                                <input type="file" name="proposta" class="form-control" value="{{ $data->proposta }}">
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