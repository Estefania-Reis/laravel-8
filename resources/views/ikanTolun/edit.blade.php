@extends('layout.admin')

@section('content')

<body>
    <h1 class="text-center mb-4">Hadia Dadus</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                    <form action="/updatedataikan/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tipu Ikan</label>
                                <select class="form-select" name="tipu_id" aria-label="Default select example">
                                    @foreach ($datatipuikan as $dataikan)
                                    @if(old('tipu_id', $data->tipu_id) == $dataikan->id)
                                    <option value="{{ $dataikan->id }}" selected>{{ $dataikan->naran }}</option>
                                    @else
                                    <option value="{{ $dataikan->id }}">{{ $dataikan->naran }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jerasaun</label>
                                <select class="form-select" name="jerasaun" aria-label="Default select example">
                                    <option selected>{{ $data->jerasaun }}</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select>
                            </div>
                           
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">kuantidade Ikan Aman</label>
                                <input type="number" name="kuantidade_ikan_aman" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->kuantidade_ikan_aman }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">kuantidade Ikan Inan</label>
                                <input type="number" name="kuantidade_ikan_inan" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->kuantidade_ikan_inan }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Orijem Ikan</label>
                                <select class="form-select" name="orijem_id" aria-label="Default select example">
                                    @foreach ($dataorijemikan as $dataori)
                                    @if(old('orijem_id', $data->orijem_id) == $dataori->id)
                                    <option value="{{ $dataori->id }}" selected>{{ $dataori->naran }}</option>
                                    @else
                                    <option value="{{ $dataori->id }}">{{ $dataori->naran }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div>  

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Id Kolam</label>
                                <select class="form-select" name="kolam_id" aria-label="Default select example">
                                    @foreach ($datakolam as $datakol)
                                    @if(old('kolam_id', $data->kolam_id) == $datakol->id)
                                    <option value="{{ $datakol->id }}" selected>{{ $datakol->id }}</option>
                                    @else
                                    <option value="{{ $datakol->id }}">{{ $datakol->id }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div> 
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Id Hapa</label>
                                <select class="form-select" name="hapa_id" aria-label="Default select example">
                                    @foreach ($datahapa as $datah)
                                    @if(old('hapa_id', $data->hapa_id) == $datah->id)
                                    <option value="{{ $datah->id }}" selected>{{ $datah->id }}</option>
                                    @else
                                    <option value="{{ $datah->id }}">{{ $datah->id }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div> 

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Periodo Hahu Hakiak Ikan</label>
                                <input type="text" name="periodo" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ date('j-n-Y ', strtotime($data->periodo)) }}"> 
                              </div>

                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Periodo Expire</label>
                                <input type="text" name="periodo_expire" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ date('j-n-Y ', strtotime($data->periodo_expire)) }}"> 
                              </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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