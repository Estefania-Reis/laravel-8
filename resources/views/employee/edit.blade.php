@extends('layout.admin')

@section('content')

<body>
    <div class="content-wrapper">
    <h1 class="text-center mb-4">Edit Dadus FPA</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updatedataemp/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Naran Kompletu</label>
                                <input type="text" name="naran" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->naran }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jeneru</label>
                                <select class="form-select" name="jeneru" aria-label="Default select example">
                                    <option selected>{{ $data->jeneru }}</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Numero Telemovel</label>
                                <input type="number" name="nmr_telefone" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $data->nmr_telefone }}">
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                {{-- delete old img when upload new one --}}
                                <input type="hidden" name="oldImage" value="{{ $data->foto }}">
                            
                                @if($data->foto)
                                <img src="{{ asset('storage/fotopegawai/'.$data->foto) }}" class="img-preview img-fluid mb-3 col-sm-3 d-block">
                                @else
                                <img class="img-preview img-fluid mb-3 col-sm-3">
                                @endif
                            
                                <input class="form-control @error('foto') is-invalid @enderror" type="file" 
                                id="foto" name="foto" onchange="previewImage()">
                                @error('foto')
                                <div class="invalid_feedback">
                                  {{ $message }}
                                </div> 
                                  @enderror
                              </div>

                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Data Moris</label>
                                <input type="text" name="data_moris" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ date('j-n-Y ', strtotime($data->data_moris)) }}"> 
                              </div>
                              
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pozisaun</label>
                                <select class="form-select" name="pozisaun" aria-label="Default select example">
                                    <option selected>{{ $data->pozisaun }}</option>
                                    <option value="chefe departamento (PAAD)">chefe departamento (PAAD)</option>
                                    <option value="responsavel centro">responsavel centro</option>
                                    <option value="tekniku administrasaun1">tekniku administrasaun1</option>
                                    <option value="tekniku administrasaun2">tekniku administrasaun2</option>
                                    <option value="tekniku (brood fish)">tekniku (brood fish)</option>
                                    <option value="tekniku (incubator)">tekniku (incubator)</option>
                                    <option value="tekniku (srt)">tekniku (srt)</option>
                                    <option value="tekniku (nursery)">tekniku (nursery)</option>
                                    <option value="tekniku (water quality and disease)">tekniku (water quality and disease)</option>
                                    <option value="staff">staff</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option selected>{{ $data->status }}</option>
                                    <option value="permanente">permanente</option>
                                    <option value="casuais">casuais</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nivel Edukasaun</label>
                                <select class="form-select" name="nivel_ed_id" aria-label="Default select example">
                                    @foreach ($datanivel as $dataniv)
                                    @if(old('nivel_ed_id', $data->nivel_ed_id) == $dataniv->id)
                                    <option value="{{ $dataniv->id }}" selected>{{ $dataniv->naran }}</option>
                                    @else
                                    <option value="{{ $dataniv->id }}">{{ $dataniv->naran }}</option> 
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Level</label>
                                <select class="form-select" name="level" aria-label="Default select example">
                                    <option selected>{{ $data->level }}</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Observasaun</label>
                                <select class="form-select" name="obs" aria-label="Default select example">
                                    <option selected>{{ $data->obs }}</option>
                                    <option value="Nacional">Nacional</option>
                                    <option value="Extencionista Municipio">Extencionista Municipio</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
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