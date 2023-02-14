@extends('layout.admin')

@section('content')
<body>
    <div class="content-wrapper mt-5">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center">
                            <strong>Adisiona Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insert-pedidu" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="date" name="data" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('data')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Tipu Benefisiariu</label><br>
                                    <select class="form-select" name="tipu_benefisiariu" id="tipu_benefisiariu" aria-label="Default select example">
                                        <option selected> Hili... </option>
                                        <option value="benefisiariu individual">benefisiariu individual</option>
                                        <option value="benefisiariu grupu">benefisiariu grupu</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Id Benefisiariu Individual</label><br>
                                    <select class="form-select" name="id_benefisiariu_ind" aria-label="Default select example">
                                        <option selected value="-">Hili...</option>
                                        @foreach ($databind as $data)
                                            <option value="{{ $data->id_kliente }}">{{ $data->id_kliente }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Id Benefisiariu Grupo</label><br>
                                    <select class="form-select" name="id_benefisiariu_gp" aria-label="Default select example">
                                        <option selected value="-">Hili...</option>
                                        @foreach ($databgp as $data)
                                            <option value="{{ $data->id_klientegrupo }}">{{ $data->id_klientegrupo }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Id Benefisiariu Individual</label>
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
                                </div> --}}
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Objetivu</label><br>
                                    <select class="form-select" name="objetivu" id="objetivu" aria-label="Default select example">
                                        <option selected> Hili... </option>
                                        <option value="komersial">komersial</option>
                                        <option value="laos komersial">laos komersial</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Karta Proposta</label>
                                    <input type="file" name="proposta" class="form-control" >
                                </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total M. Sex</label>
                                <input type="text" name="total_msex" class="form-control" id="total_msex"
                                    aria-describedby="emailHelp">
                                    @error('total_msex')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total N. M. Sex</label>
                                <input type="text" name="total_nmsex" class="form-control" id="total_nmsex"
                                    aria-describedby="emailHelp">
                                    @error('total_nmsex')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Deskreve Kolam</label>
                                <input type="text" name="deskreve_kolam" class="form-control" >
                            </div>
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
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        {{-- <script>
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
        </script> --}}
</body>

@endsection