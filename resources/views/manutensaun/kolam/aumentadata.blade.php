@extends('layout.admin')

@section('content')

<body>
    <div class="content-wrapper mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size: 20px">
                            <strong>Adisiona Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insertdatakolam" method="POST" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1" class="form-label">Tipu Kolam</label><br>
                                    <select class="form-select" name="tipu_kolam" aria-label="Default select example">
                                            <option selected value="-">hili</option>
                                            <option value="kandidatu brood">kandidatu brood</option>
                                            <option value="brood">brood</option>
                                            <option value="nursery">nursery</option>
                                            <option value="srt">srt</option>
                                            <option value="nursery none mono sex">nursery none mono sex</option>
                                    </select>
                                </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Funsionamentu</label>
                                    <input type="text" name="funsionamentu" class="form-control" id="funsionamentu"
                                        aria-describedby="emailHelp">
                                        @error('funsionamentu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Tekniku</label><br>
                                <select class="form-select" name="employee_id" aria-label="Default select example">
                                    @foreach ($dataemployee as $data)
                                        <option selected value="{{ $data->id_employee }}">{{ $data->naran }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Comprimento (m)</label>
                                <input type="text" name="comprimento_kolam" class="form-control" id="comprimento_kolam"
                                    aria-describedby="emailHelp" value=0>
                                    @error('comprimento_kolam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Largura (m)</label>
                            <input type="text" name="largura_kolam" class="form-control" id="largura_kolam"
                                aria-describedby="emailHelp" value=0>
                                @error('largura_kolam')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Area (m kuadradu)</label>
                            <input type="text" name="area_kolam" class="form-control" id="area_kolam"
                                aria-describedby="emailHelp" readonly>
                                
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Aas/Altura Bee (m)</label>
                            <input type="text" name="altura_kolam" class="form-control" id="altura_kolam"
                                aria-describedby="emailHelp" value=0>
                                @error('altura_kolam')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Volume Bee (m kubiku)</label>
                            <input type="text" name="volume_kolam" class="form-control" id="volume_kolam"
                                aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Status Kolam</label><br>
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option selected>Hili</option>
                                <option value="diak">diak</option>
                                <option value="aat">aat</option>
                                <option value="aatgrave">aat grave</option>
                                <option value="manutensaun">manutensaun</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Observasaun</label>
                            <input type="text" name="observasaun" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                                @error('observasaun')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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

    {{-- script below is for selecpicker from bootstrap version 4 --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).on('blur','#area_kolam', function(){
        let comprimento_kolam = parseFloat($('#comprimento_kolam').val())
        let largura_kolam = parseFloat($('#largura_kolam').val())
        let rezultadu = comprimento_kolam * largura_kolam
        $('#area_kolam').val(rezultadu)
    })
    $(document).on('blur','#largura_kolam', function(){
        let comprimento_kolam = parseFloat($('#comprimento_kolam').val())
        let largura_kolam = parseFloat($('#largura_kolam').val())
        let rezultadu = comprimento_kolam * largura_kolam 
        $('#area_kolam').val(rezultadu)
    })
    $(document).on('blur','#comprimento_kolam', function(){
        let comprimento_kolam = parseFloat($('#comprimento_kolam').val())
        let largura_kolam = parseFloat($('#largura_kolam').val())
        let rezultadu = comprimento_kolam * largura_kolam
        $('#area_kolam').val(rezultadu)
    })

    $(document).on('blur','#volume_kolam', function(){
        let area_kolam = parseFloat($('#area_kolam').val())
        let altura_kolam = parseFloat($('#altura_kolam').val())
        let rezultadu = area_kolam * altura_kolam 
        $('#volume_kolam').val(rezultadu)
    })

    $(document).on('blur','#area_kolam', function(){
        let area_kolam = parseFloat($('#area_kolam').val())
        let altura_kolam = parseFloat($('#altura_kolam').val())
        let rezultadu = area_kolam * altura_kolam
        $('#volume_kolam').val(rezultadu)
    })
        
    $(document).on('blur','#altura_kolam', function(){
        let area_kolam = parseFloat($('#area_kolam').val())
        let altura_kolam = parseFloat($('#altura_kolam').val())
        let rezultadu = area_kolam * altura_kolam
        $('#volume_kolam').val(rezultadu)
    })

</script>
</body>

@endsection