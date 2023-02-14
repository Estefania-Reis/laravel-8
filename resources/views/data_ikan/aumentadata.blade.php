@extends('layout.admin')

@section('content')
<body>
    <div class="content-wrapper mt-5">
        {{-- <div class="col-auto">
            <a href="../../data_ikan/index" class="btn btn-info"><i class="nav-icon fas fa-arrow-circle-left"></i> Ikan (Brood)</a>
        </div> --}}

    
   
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size: 20px">
                            <div class="stron">Adisiona Dadus</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insertdataikan" method="POST" enctype="multipart/form-data">
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
                                        <label for="exampleInputEmail1" class="form-label">Tipu Ikan</label><br>
                                        <select class="form-select" name="tipu_ikan" aria-label="Default select example">
                                            @foreach ($dataimport as $data)
                                                <option selected value="{{ $data->tipu }}">{{ $data->tipu }}</option>
                                            @endforeach
                                        </select>  
                                </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Orijem Ikan</label><br>
                                <select class="form-select" name="nasaun" aria-label="Default select example">
                                    @foreach ($dataimport as $data)
                                        <option selected value="{{ $data->nasaun }}">{{ $data->nasaun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Jerasaun</label><br>
                                <select class="form-select" name="jerasaun" aria-label="Default select example">
                                    {{-- <option selected>Hili Jerasaun</option> --}}
                                    <option selected value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Kode Kolam</label><br>
                                <select class="form-select" name="kolam_id" aria-label="Default select example">
                                    @foreach ($datakolam as $data)
                                        <option selected value="{{ $data->id_kolam }}">{{ $data->id_kolam }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Kode Hapa</label><br>
                                <select class="form-select" name="hapa_id" aria-label="Default select example">
                                    @foreach ($datahapa as $data)
                                        <option selected value="{{ $data->id_hapa }}">{{ $data->id_hapa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Kodigu Familia</label><br>
                                <select class="form-select" name="codigo_familia" aria-label="Default select example">
                                    {{-- <option selected>Hili Jerasaun</option> --}}
                                    <option selected value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Aman</label>
                                <input type="text" name="total_m" class="form-control" id="total_m"
                                    aria-describedby="emailHelp" value="0">
                                    @error('total_m')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>      
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Inan</label>
                                <input type="text" name="total_f" class="form-control" id="total_f"
                                    aria-describedby="emailHelp" value="0">
                                    @error('total_f')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan</label>
                                <input type="text" name="total" class="form-control" id="total"
                                    aria-describedby="emailHelp" value="0" readonly>
                                    @error('total')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data Husik</label>
                                <input type="date" name="data" class="form-control" id="data"
                                    aria-describedby="emailHelp">
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data Diminuisaun</label>
                                <input type="date" name="data_dim" class="form-control" id="data_dim"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Tipu Diminui</label><br>
                                <select class="form-select" name="tipu_dim" aria-label="Default select example">
                                    <option value=""selected> Hili... </option>
                                    <option value="haksoit sai">haksoit sai</option>
                                    <option value="mate">mate</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Razaun</label>
                                <input type="text" name="razaun" itemprop="razaun" class="form-control" id="razaun" 
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Ikan Aman Diminuidu</label>
                                <input type="text" name="qty_dim_m" itemprop="qty_dim_m" class="form-control" id="qty_dim_m" 
                                    aria-describedby="emailHelp" value="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Ikan Inan Diminuidu</label>
                                <input type="text" name="qty_dim_f" itemprop="qty_dim_f" class="form-control" id="qty_dim_f" 
                                    aria-describedby="emailHelp" value="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Total Ikan Diminuidu</label>
                                <input type="text" name="total_dim" itemprop="total_dim" class="form-control" id="total_dim" 
                                    aria-describedby="emailHelp" readonly value="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Rezerva Ikan Aman</label>
                                <input type="text" name="qty_rez_m" itemprop="qty_rez_m" class="form-control" id="qty_rez_m" 
                                    aria-describedby="emailHelp" value="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Rezerva Ikan Inan</label>
                                <input type="text" name="qty_rez_f" itemprop="qty_rez_f" class="form-control" id="qty_rez_f" 
                                    aria-describedby="emailHelp" value="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Total Ikan Rezerva </label>
                                <input type="text" name="total_rez" itemprop="total_rez" class="form-control" id="total_rez" 
                                    aria-describedby="emailHelp" readonly value="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Total Rezerva Ikan Aman</label>
                                <input type="text" name="total_rez_m"  itemprop="total_rez_m" class="form-control" id="total_rez_m" 
                                    aria-describedby="emailHelp" value="0" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Total Rezerva Ikan Inan</label>
                                <input type="text" name="total_rez_f" itemprop="total_rez_f" class="form-control" id="total_rez_f" 
                                    aria-describedby="emailHelp" value="0" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"class="form-label">Sub-total Ikan Rezerva </label>
                                <input type="text" name="sub_total_rez" itemprop="sub_total_rez" class="form-control" id="sub_total_rez" 
                                    aria-describedby="emailHelp" value="0" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Ikan Aman Atual</label>
                                <input type="text" name="qty_atual_m" class="form-control" id="qty_atual_m"
                                    aria-describedby="emailHelp" value="0" readonly>
                                    @error('qty_atual_m')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Ikan Inan Atual</label>
                                <input type="text" name="qty_atual_f" class="form-control" id="qty_atual_f"
                                    aria-describedby="emailHelp" value="0" readonly>
                                    @error('qty_atual_f')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Ikan Atual</label>
                                <input type="text" name="total_atual" class="form-control" id="total_atual"
                                    aria-describedby="emailHelp" value="0" readonly>
                                    @error('total_atual')
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
 
    
   {{-- total ikan rejistu--}}
    <script>
        $(document).on('blur','#total', function(){
        let total_m = parseFloat($('#total_m').val())
        let total_f = parseFloat($('#total_f').val())
        let rezultadu =  total_m + total_f
        $('#total').val(rezultadu)
    })
    $(document).on('blur','#total_m', function(){
        let total_m = parseFloat($('#total_m').val())
        let total_f = parseFloat($('#total_f').val())
        let rezultadu =  total_m + total_f
        $('#total').val(rezultadu)
    })
    $(document).on('blur','#total_f', function(){
        let total_m = parseFloat($('#total_m').val())
        let total_f = parseFloat($('#total_f').val())
        let rezultadu =  total_m + total_f
        $('#total').val(rezultadu)
    })
    </script> 

     {{-- total ikan rezerva--}}
     <script>
        $(document).on('blur','#total_rez', function(){
        let qty_rez_m = parseFloat($('#qty_rez_m').val())
        let qty_rez_f = parseFloat($('#qty_rez_f').val())
        let rezultadu =  qty_rez_m + qty_rez_f
        $('#total_rez').val(rezultadu)
    })
    $(document).on('blur','#qty_rez_m', function(){
        let qty_rez_m = parseFloat($('#qty_rez_m').val())
        let qty_rez_f = parseFloat($('#qty_rez_f').val())
        let rezultadu =  qty_rez_m + qty_rez_f
        $('#total_rez').val(rezultadu)
    })
    $(document).on('blur','#qty_rez_f', function(){
        let qty_rez_m = parseFloat($('#qty_rez_m').val())
        let qty_rez_f = parseFloat($('#qty_rez_f').val())
        let rezultadu =  qty_rez_m + qty_rez_f
        $('#total_rez').val(rezultadu)
    })
    </script> 
   
    {{-- total ikan Atual--}}
    <script>
        $(document).on('blur','#total_atual', function(){
        let qty_atual_f = parseFloat($('#qty_atual_f').val())
        let qty_atual_m = parseFloat($('#qty_atual_m').val())
        let rezultadu =  qty_atual_m + qty_atual_f
        $('#total_atual').val(rezultadu)
    })
    $(document).on('blur','#qty_atual_m', function(){
        let qty_atual_f = parseFloat($('#qty_atual_f').val())
        let qty_atual_m = parseFloat($('#qty_atual_m').val())
        let rezultadu = qty_atual_m + qty_atual_f 
        $('#total_atual').val(rezultadu)
    })
    $(document).on('blur','#qty_atual_f', function(){
        let qty_atual_f = parseFloat($('#qty_atual_f').val())
        let qty_atual_m = parseFloat($('#qty_atual_m').val())
        let rezultadu = qty_atual_m + qty_atual_f
        $('#total_atual').val(rezultadu)
    })
    </script>

    {{-- Tinan --}}
    {{-- <script>
        $(document).on('blur','#tinan', function(){
        let data = new Date($('#data').val())
        let rezultadu =  data.getFullYear()
        $('#tinan').val(rezultadu)
    })
    </script> --}}

    {{-- total ikan diminui jeral --}}
    <script>
        $(document).on('blur','#total_dim', function(){
        let qty_dim_m = parseFloat($('#qty_dim_m').val())
        let qty_dim_f = parseFloat($('#qty_dim_f').val())
        let rezultadu = qty_dim_m + qty_dim_f
        $('#total_dim').val(rezultadu)
    })
    $(document).on('blur','#qty_dim_f', function(){
        let qty_dim_m = parseFloat($('#qty_dim_m').val())
        let qty_dim_f = parseFloat($('#qty_dim_f').val())
        let rezultadu = qty_dim_m + qty_dim_f 
        $('#total_dim').val(rezultadu)
    })
    $(document).on('blur','#qty_dim_m', function(){
        let qty_dim_m = parseFloat($('#qty_dim_m').val())
        let qty_dim_f = parseFloat($('#qty_dim_f').val())
        let rezultadu = qty_dim_m + qty_dim_f
        $('#total_dim').val(rezultadu)
    })
    </script>

    {{-- total ikan aman atual--}}
    <script>
        
            $(document).on('blur','#total_rez_m', function(){
                let qty_rez_m = parseFloat($('#qty_rez_m').val())
                let qty_dim_m = parseFloat($('#qty_dim_m').val())
                let total_rez_m = parseFloat($('#total_rez_m').val())
                let total_m = parseFloat($('#total_m').val())
                let rezultadu = (-qty_dim_m + qty_rez_m)
                let rezultadu1 = total_m + rezultadu
                if(rezultadu > 0){
                    $('#total_rez_m').val(rezultadu)
                    $('#qty_atual_m').val(total_m)
                }
                else if(rezultadu = 0){
                    $('#total_rez_m').val(0)
                    $('#qty_atual_m').val(rezultadu1)
                }
                else {
                    $('#total_rez_m').val(0)
                    $('#qty_atual_m').val(rezultadu1)
                }
        })
    </script>
     {{-- total ikan inan atual--}}
     <script>
         $(document).on('blur','#total_rez_f', function(){
                let qty_rez_f = parseFloat($('#qty_rez_f').val())
                let qty_dim_f = parseFloat($('#qty_dim_f').val())
                let total_rez_f = parseFloat($('#total_rez_f').val())
                let total_f = parseFloat($('#total_f').val())
                let rezultadu = (-qty_dim_f + qty_rez_f)
                let rezultadu1 = total_f + rezultadu
                if(rezultadu > 0){
                    $('#total_rez_f').val(rezultadu)
                    $('#qty_atual_f').val(total_f)
                }
                else if(rezultadu = 0){
                    $('#total_rez_f').val(0)
                    $('#qty_atual_f').val(rezultadu1)
                }
                else {
                    $('#total_rez_f').val(0)
                    $('#qty_atual_f').val(rezultadu1)
                }
    })
    </script>
    
        {{-- operasaun sub total rezerva ikan --}}
    <script>
        $(document).on('blur','#sub_total_rez', function(){ 
            let total_rez_m = parseFloat($('#total_rez_m').val())
            let total_rez_f = parseFloat($('#total_rez_f').val())
            let sub_total_rez = parseFloat($('#sub_total_rez').val())
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
       $(document).on('blur','#total_rez_m', function(){ 
            let total_rez_m = parseFloat($('#total_rez_m').val())
            let total_rez_f = parseFloat($('#total_rez_f').val())
            let sub_total_rez = parseFloat($('#sub_total_rez').val())
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
       $(document).on('blur','#total_rez_f', function(){ 
            let total_rez_m = parseFloat($('#total_rez_m').val())
            let total_rez_f = parseFloat($('#total_rez_f').val())
            let sub_total_rez = parseFloat($('#sub_total_rez').val())
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
    </script>
    </div>
        
   
</body>

@endsection