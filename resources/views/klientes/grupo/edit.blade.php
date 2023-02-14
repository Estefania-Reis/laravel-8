@extends('layout.admin')

@section('content')

<body>
    <h1 class="text-center mb-4">Edit Dadus FPA</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updategp/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Naran Grupo</label>
                                <input type="text" name="naran" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->naran }}">
                                    @error('naran')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Naran Xefe Grupo</label>
                                <input type="text" name="chefe_grupo" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->chefe_grupo }}">
                                    @error('chefe_grupo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jeneru</label>
                                <select class="form-select" name="jeneru" aria-label="Default select example">
                                    <option selected value="{{ $data->jeneru }}" >{{ $data->jeneru }}</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                            <h6>Enderesu Grupo</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Aldeia</label>
                                <select class="form-select" name="r_aldeia" aria-label="Default select example">
                                    @foreach ($dataaldeia as $data1)
                                    @if(old('aldeia_id', $data->aldeia_id) == $data1->id)
                                    <option value="{{ $data1->id }}" selected>{{ $data1->naran }}</option>
                                    @else
                                    <option value="{{ $data1->id }}">{{ $data1->naran }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Suco</label>
                                <select class="form-select" name="r_suku" aria-label="Default select example">
                                    @foreach ($datasuco as $data2)
                                    @if(old('r_suku', $data->r_suku) == $data2->id)
                                    <option value="{{ $data2->id }}" selected>{{ $data2->naran }}</option>
                                    @else
                                    <option value="{{ $data2->id }}">{{ $data2->naran }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Posto Administrativo</label>
                                <select class="form-select" name="r_postu" aria-label="Default select example">
                                    @foreach ($dataposto as $data3)
                                    @if(old('r_postu', $data->r_postu) == $data3->id)
                                    <option value="{{ $data3->id }}" selected>{{ $data3->naran }}</option>
                                    @else
                                    <option value="{{ $data3->id }}">{{ $data3->naran }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Municipio</label>
                                <select class="form-select" name="r_munisipio" aria-label="Default select example">
                                    @foreach ($datamunicipio as $data4)
                                    @if(old('r_munisipio', $data->r_munisipio) == $data4->id)
                                    <option value="{{ $data4->id }}" selected>{{ $data4->naran }}</option>
                                    @else
                                    <option value="{{ $data4->id }}">{{ $data4->naran }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Numero Telemovel</label>
                                <input type="text" name="nmr_telfone" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->nmr_telfone }}">
                            </div>

                            <div class="mb-3">
                                <label for="foto_kartaun" class="form-label">foto_kartaun</label>
                                {{-- delete old img when upload new one --}}
                                <input type="hidden" name="oldImage" value="{{ $data->foto_kartaun }}">
                            
                                @if($data->foto_kartaun)
                                <img src="{{ asset('storage/foto_kartaunklientegrupo/'.$data->foto_kartaun) }}" class="img-preview img-fluid mb-3 col-sm-3 d-block">
                                @else
                                <img class="img-preview img-fluid mb-3 col-sm-3">
                                @endif
                            
                                <input class="form-control @error('foto_kartaun') is-invalid @enderror" type="file" 
                                id="foto_kartaun" name="foto_kartaun" onchange="previewImage()">
                                @error('foto_kartaun')
                                <div class="invalid_feedback">
                                  {{ $message }}
                                </div> 
                                  @enderror
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

    {{-- function preview for update image --}}
    <script>
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
    </script>
</body>

@endsection