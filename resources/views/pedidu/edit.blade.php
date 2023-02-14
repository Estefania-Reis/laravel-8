@extends('layout.admin')

@section('content')
<body>
    <div class="content-wrapper mt-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center">
                            <strong>Hadia Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/update-pedidu/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data</label>
                                <input type="text" name="data" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ date('j-n-Y ', strtotime($data->data)) }}">
                            </div>

                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Tipu Benefisiariu</label><br>
                                <select class="form-select" name="tipu_benefisiariu" id="tipu_benefisiariu" aria-label="Default select example">
                                    <option selected value="{{ $data->tipu_benefisiariu }}"> {{ $data->tipu_benefisiariu }} </option>
                                    <option value="benefisiariu individual">benefisiariu individual</option>
                                    <option value="benefisiariu grupu">benefisiariu grupu</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Benefisiariu Individual</label><br>
                                <select class="form-select" name="id_benefisiariu_ind" aria-label="Default select example">
                                    <option selected value="{{ $data->id_benefisiariu_ind }}">{{ $data->id_benefisiariu_ind }}</option>
                                    @foreach ($databind as $data)
                                        <option value="{{ $data->id_kliente }}">{{ $data->id_kliente }}</option>
                                    @endforeach
                                </select>
                            </div>  

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Id Benefisiariu Grupu</label><br>
                                <select class="form-select" name="id_benefisiariu_gp" aria-label="Default select example">
                                    <option selected value="{{ $data->id_benefisiariu_gp }}">{{ $data->id_benefisiariu_gp }}</option>
                                    @foreach ($databgp as $data)
                                        <option value="{{ $data->id_klientegrupo }}">{{ $data->id_klientegrupo }}</option>
                                    @endforeach
                                </select>
                            </div> 

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Objetivu</label><br>
                                <select class="form-select" name="objetivu" id="objetivu" aria-label="Default select example">
                                    <option selected value="{{ $data->objetivu }}"> {{ $data->objetivu }} </option>
                                    <option value="komersial">komersial</option>
                                    <option value="laos komersial">laos komersial</option>
                                </select>
                            </div>
                            {{-- <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Karta Proposta</label>
                                <input type="file" name="proposta" class="form-control" value="{{  asset('storage/proposta-pedidu/'.$data->proposta) }}">
                            </div> --}}

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Karta Proposta</label>
                                {{-- delete old img when upload new one --}}
                                <input type="hidden" name="oldImage" value="{{ $data->proposta }}">
                                <input class="form-control @error('proposta') is-invalid @enderror" type="file" 
                                id="proposta" name="proposta">
                                @error('proposta')
                                <div class="invalid_feedback">
                                  {{ $message }}
                                </div> 
                                  @enderror
                              </div>

                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Total M. Sex</label>
                            <input type="text" name="total_msex" class="form-control" id="total_msex"
                                aria-describedby="emailHelp" value="{{ $data->total_msex }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Total N. M. Sex</label>
                            <input type="text" name="total_nmsex" class="form-control" id="total_nmsex"
                                aria-describedby="emailHelp" value="{{ $data->total_nmsex }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Deskreve Kolam</label>
                            <input type="text" name="deskreve_kolam" class="form-control" value="{{ $data->deskreve_kolam }}">
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
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    {{-- function preview for update image --}}
    {{-- <script>
        function previewImage(){
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);
        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script> --}}
</body>

@endsection