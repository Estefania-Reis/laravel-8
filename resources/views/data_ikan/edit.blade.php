@extends('layout.admin')

@section('content')

<body>
    <div class="wrapper">
        <h1 class="text-center mb-4">Hadia Dadus</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                    <form action="/updatedataikan/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="mb-3 mr-3">
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
                                <div class="mb-3 mr-3">
                                        <label for="exampleInputEmail1" class="form-label">Tipu Ikan</label><br>
                                        <select class="form-select" name="tipu_ikan" aria-label="Default select example">
                                            @foreach ($dataimport as $datat)
                                            @if (old('tipu_ikan', $data->tipu_ikan) == $datat->tipu)
                                            <option selected value="{{ $datat->tipu }}">{{ $datat->tipu }}</option>
                                            @else
                                            <option value="{{ $datat->tipu }}">{{ $datat->tipu }}</option>
                                            @endif
                                                
                                            @endforeach
                                        </select>  
                                </div>
                            <div class="mb-3 mr-3">
                                <label for="exampleInputEmail1" class="form-label">Orijem Ikan</label><br>
                                <select class="form-select" name="nasaun" aria-label="Default select example">
                                    @foreach ($dataimport as $datao)
                                    @if (old('nasaun', $data->nasaun) == $datao->nasaun)
                                    <option selected value="{{ $datao->nasaun }}">{{ $datao->nasaun }}</option>
                                    @else
                                    <option value="{{ $datao->nasaun }}">{{ $datao->nasaun }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mr-3">
                                <label for="exampleInputEmail1" class="form-label">Jerasaun</label><br>
                                <select class="form-select" name="jerasaun" aria-label="Default select example">
                                    {{-- <option selected>Hili Jerasaun</option> --}}
                                    <option selected value="{{ $data->jerasaun }}">{{ $data->jerasaun }}</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select>
                            </div>
                            <div class="mb-3 mr-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Kolam</label><br>
                                <select class="form-select" name="kolam_id" aria-label="Default select example">
                                    @foreach ($datakolam as $datak)
                                    @if (old('kolam_id', $data->kolam_id) == $datak->id_kolam)
                                    <option selected value="{{ $datak->id_kolam }}">{{ $datak->id_kolam }}</option>
                                    @else
                                    <option value="{{ $datak->id_kolam }}">{{ $datak->id_kolam }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mr-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Hapa</label><br>
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
                            <div class="mb-3 mr-3">
                                <label for="exampleInputEmail1" class="form-label">Kodigu Familia</label><br>
                                <select class="form-select" name="codigo_familia" aria-label="Default select example">
                                    <option selected value="{{ $data->codigo_familia }}">{{ $data->codigo_familia }}</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                </select>
                            </div> 
                            </div>
                        <div class="form-row">                   
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Aman</label>
                                <input type="text" name="total_m" class="form-control" id="total_m"
                                    aria-describedby="emailHelp" value="{{ $data->total_m }}">
                            </div>      
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Inan</label>
                                <input type="text" name="total_f" class="form-control" id="total_f"
                                    aria-describedby="emailHelp" value="{{ $data->total_f }}">
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan</label>
                                <input type="text" name="total" class="form-control" id="total"
                                    aria-describedby="emailHelp" value="{{ $data->total }}" readonly>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data Husik</label>
                                <input type="text" name="data" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ date('j-n-Y', strtotime($data->data)) }}">
                            </div> 
                        </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data Diminuisaun</label>
                                    <input type="text" name="data_dim" class="form-control"
                                        aria-describedby="emailHelp" @if (old('data_dim', $data->data_dim) == null)
                                        value="{{ $data->data_dim }}"
                                        @else
                                        value="{{ date('j-n-Y', strtotime($data->data_dim)) }}"
                                        @endif >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Tipu Diminui</label><br>
                                    <select class="form-select" name="tipu_dim" aria-label="Default select example">
                                        <option value="{{ $data->tipu_dim }}" selected> {{ $data->tipu_dim }} </option>
                                        <option value="haksoit sai">haksoit sai</option>
                                        <option value="mate">mate</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Razaun</label>
                                    <input type="text" name="razaun" itemprop="razaun" class="form-control" id="razaun" 
                                        aria-describedby="emailHelp" value="{{ $data->razaun }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Ikan Aman Diminuidu</label>
                                    <input type="text" name="qty_dim_m" itemprop="qty_dim_m" class="form-control" id="qty_dim_m" 
                                        aria-describedby="emailHelp" value="{{ $data->qty_dim_m }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Ikan Inan Diminuidu</label>
                                    <input type="text" name="qty_dim_f" itemprop="qty_dim_f" class="form-control" id="qty_dim_f" 
                                        aria-describedby="emailHelp" value="{{ $data->qty_dim_f }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Diminuidu</label>
                                    <input type="text" name="total_dim" itemprop="total_dim" class="form-control" id="total_dim" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->total_dim }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Rezerva Ikan Aman</label>
                                    <input type="text" name="qty_rez_m" itemprop="qty_rez_m" class="form-control" id="qty_rez_m" 
                                        aria-describedby="emailHelp" value="{{ $data->qty_rez_m }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Rezerva Ikan Inan</label>
                                    <input type="text" name="qty_rez_f" itemprop="qty_rez_f" class="form-control" id="qty_rez_f" 
                                        aria-describedby="emailHelp" value="{{ $data->qty_rez_f }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Rezerva </label>
                                    <input type="text" name="total_rez" itemprop="total_rez" class="form-control" id="total_rez" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->total_rez }}">
                                </div>
                               </div>
                               <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Total Rezerva Ikan Aman</label>
                                    <input type="text" name="total_rez_m"  itemprop="total_rez_m" class="form-control" id="total_rez_m" 
                                        aria-describedby="emailHelp" value="{{ $data->total_rez_m }}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Total Rezerva Ikan Inan</label>
                                    <input type="text" name="total_rez_f" itemprop="total_rez_f" class="form-control" id="total_rez_f" 
                                        aria-describedby="emailHelp" value="{{ $data->total_rez_f }}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"class="form-label">Sub-total Ikan Rezerva </label>
                                    <input type="text" name="sub_total_rez" itemprop="sub_total_rez" class="form-control" id="sub_total_rez" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->sub_total_rez }}">
                                </div>
                               </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Ikan Aman Atual</label>
                                    <input type="text" name="qty_atual_m" class="form-control" id="qty_atual_m"
                                        aria-describedby="emailHelp" value="{{ $data->qty_atual_m }}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Ikan Inan Atual</label>
                                    <input type="text" name="qty_atual_f" class="form-control" id="qty_atual_f"
                                        aria-describedby="emailHelp" value="{{ $data->qty_atual_f }}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Ikan Atual</label>
                                    <input type="text" name="total_atual" class="form-control" id="total_atual"
                                        aria-describedby="emailHelp" value="{{ $data->total_atual }}" readonly>
                                        @error('total_atual')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>               
                          <button type="submit" class="btn btn-info">Submete</button>
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
     {{-- total ikan inan rezerva no ikan inan atual--}}
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
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
       $(document).on('blur','#total_rez_m', function(){ 
            let total_rez_m = parseFloat($('#total_rez_m').val())
            let total_rez_f = parseFloat($('#total_rez_f').val())
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
       $(document).on('blur','#total_rez_f', function(){ 
            let total_rez_m = parseFloat($('#total_rez_m').val())
            let total_rez_f = parseFloat($('#total_rez_f').val())
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
    </script>
    {{-- operasaun sub total rezerva ikan --}}
    <script>
        $(document).on('blur','#sub_total_rez', function(){ 
            let total_rez_m = parseFloat($('#total_rez_m').val())
            let total_rez_f = parseFloat($('#total_rez_f').val())
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
       $(document).on('blur','#total_rez_m', function(){ 
            let total_rez_m = parseFloat($('#total_rez_m').val())
            let total_rez_f = parseFloat($('#total_rez_f').val())
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
       $(document).on('blur','#total_rez_f', function(){ 
            let total_rez_m = parseFloat($('#total_rez_m').val())
            let total_rez_f = parseFloat($('#total_rez_f').val())
            let rezultadu = total_rez_m + total_rez_f 
            $('#sub_total_rez').val(rezultadu)
       })
    </script>
</body>

@endsection