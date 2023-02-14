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
                            <strong>
                                Hadia Dadus
                            </strong>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="/updateikannurseryn/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Series/Kode</label><br>
                                <select class="form-select" name="series_id" id="series_id" aria-label="Default select example">
                                    @foreach ($dataseries as $datas)
                                    @if (old('series_id', $data->series_id) == $datas->id)
                                    <option selected value="{{ $datas->id }}">{{ $datas->series }}</option>
                                    @else
                                    <option  value="{{ $datas->id }}">{{ $datas->series }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data</label>
                                <input type="text" name="data" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ date('j-n-Y', strtotime($data->data)) }}">
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Kolam Nursery</label> <br>
                                <select class="form-select" name="kolam_id" aria-label="Default select example">
                                    @foreach ($datakolam as $datak)
                                    @if (old('kolam_id', $data->kolam_id) == $datak->id_kolam)
                                    <option selected value="{{ $datak->id_kolam }}">{{ $datak->id_kolam }}</option>
                                    @else
                                    <option  value="{{ $datak->id_kolam }}">{{ $datak->id_kolam }}</option>
                                    @endif 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Hapa</label> <br>
                                <select class="form-select" name="hapa_id" aria-label="Default select example">
                                    @foreach ($datahapa as $datah)
                                    @if (old('hapa_id', $data->hapa_id) == $datah->id_hapa)
                                    <option selected value="{{ $datah->id_hapa }}">{{ $datah->id_hapa }}</option>
                                    @else
                                    <option value="{{ $datah->id_hapa }}">{{ $datah->id_hapa }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>  
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Oan</label>
                                <input type="text" name="total_ikan_oan" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->total_ikan_oan }}">
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Adisiona Ikan Oan</label><br>
                                <input type="text" name="adisiona_ikan_oan" class="form-control" id="adisiona_ikan_oan"
                                    aria-describedby="emailHelp" value="{{ $data->adisiona_ikan_oan }}">
                            </div>  
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Tipu Diminuisaun</label> <br>
                                <select name="tipu_dim" id="tipu_dim">
                                    <option value="{{ $data->tipu_dim }}" selected>{{ $data->tipu_dim }}</option>
                                    <option value="distribui">distribui</option>
                                    <option value="mate">mate</option>
                                </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Razaun Diminuisaun</label>
                                <input type="text" name="razaun_dim" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $data->razaun_dim }}">
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Diminuisaun</label>
                                <input type="text" name="total_dim" class="form-control" id="total_dim"
                                aria-describedby="emailHelp" value="{{ $data->total_dim }}">
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Kliente Individual</label><br>
                                <select class="form-select" name="klienteIndividual_id" aria-label="Default select example">
                                    <option selected value="0">Hili...</option>
                                    @foreach ($dataklienteind as $data)
                                        <option value="{{ $data->id_kliente }}">{{ $data->id_kliente }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Kliente Grupo</label><br>
                                <select class="form-select" name="klienteGrupo_id" aria-label="Default select example">
                                    <option selected value="0">Hili...</option>
                                    @foreach ($dataklientegp as $data)
                                        <option value="{{ $data->id_klientegrupo }}">{{ $data->id_klientegrupo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Plastiku M. Sex</label>
                                <input type="text" name="total_plastik_msex" class="form-control" id="total_plastik_msex"
                                aria-describedby="emailHelp" value="{{ $data->total_plastik_msex }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Plastiku N. M. Sex</label>
                                <input type="text" name="total_plastik_nmsex" class="form-control" id="total_plastik_nmsex"
                                aria-describedby="emailHelp" value="{{ $data->total_plastik_nmsex }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Ikan M. Sex Atual</label>
                                <input type="text" name="total_ikan_oan_msex_atual" class="form-control" id="total_ikan_oan_msex_atual"
                                aria-describedby="emailHelp" readonly value="{{ $data->total_ikan_oan_msex_atual }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Ikan N. M. Sex Atual</label>
                                <input type="text" name="total_ikan_oan_nmsex_atual" class="form-control" id="total_ikan_oan_nmsex_atual"
                                aria-describedby="emailHelp" readonly value="{{ $data->total_ikan_oan_nmsex_atual }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail" class="form-label">Total Ikan Oan Atual</label>
                                <input type="text" name="total_ikan_oan_atual" class="form-control" id="total_ikan_oan_atual"
                                aria-describedby="emailHelp" readonly value="{{ $data->total_ikan_oan_atual }}">
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
</body>

@endsection