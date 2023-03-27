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
                        <form action="/updateikanmate/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
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
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="text" name="data" class="form-control" id="data"
                                        aria-describedby="emailHelp" value="{{ date('j-n-Y ', strtotime($data->data)) }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Ikan</label><br>    
                                    <select class="form-select" name="ikan_id" aria-label="Default select example">
                                        @foreach ($dataikanb as $datai)
                                        @if (old('ikan_id', $data->ikan_id) == $datai->id_ikanbrood)
                                        <option selected value="{{ $datai->id_ikanbrood }}">{{ $datai->id_ikanbrood }}</option>
                                        @else
                                        <option value="{{ $datai->id_ikanbrood }}">{{ $datai->id_ikanbrood }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Kolam</label><br>
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
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Hapa</label><br>
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
                                
                            </div>
                            <div class="row">
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Aman</label> 
                                    <select class="form-select"  id="totalm1" onChange="total(this.value)" aria-label="Default select example">
                                        <option value="0" >hili</option>
                                    @foreach ($dataikanb as $dataik)
                                    @if (old('total_m', $data->ikan_id) == $dataik->id_ikanbrood)
                                    <option selected value="{{ $dataik->total_m }}">{{ $dataik->id_ikanbrood }}</option>
                                    @else
                                    <option value="{{ $dataik->total_m }}">{{ $dataik->id_ikanbrood }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                    <input type="text" name="total_m"  class="form-control" id="totalm" 
                                        aria-describedby="emailHelp" readonly value="0">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Inan</label>
                                    <select class="form-select"  id="totalf1" onChange="total1(this.value)" aria-label="Default select example">
                                        <option value="0" >hili</option>
                                    @foreach ($dataikanb as $dataik1)
                                    @if (old('total_f', $data->ikan_id) == $dataik1->id_ikanbrood)
                                    <option selected value="{{ $dataik1->total_f }}">{{ $dataik1->id_ikanbrood }}</option>
                                    @else
                                    <option value="{{ $dataik1->total_f }}">{{ $dataik1->id_ikanbrood }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                    <input type="text" name="total_f" class="form-control" id="totalf" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->total_f }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Sub-Total</label> <br>
                                    <input type="text" name="subtotal" itemprop="subtotal" class="form-control" id="subtotal" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->subtotal }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Tipu Diminui</label><br>
                                    <select class="form-select" name="tipu_diminui" aria-label="Default select example">
                                        {{-- <option selected>Hili Jerasaun</option> --}}
                                        <option selected>{{ $data->tipu_diminui }}</option>
                                        <option value="haksoit sai">haksoit sai</option>
                                        <option value="mate">mate</option>
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Razaun</label>
                                    <input type="text" name="razaun" itemprop="razaun" class="form-control" id="razaun" 
                                        aria-describedby="emailHelp" value="{{ $data->razaun }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Kuantidade Ikan Aman Diminuidu</label>
                                    <input type="text" name="qty_ikan_aman" itemprop="qty_ikan_aman" class="form-control" id="qty_ikan_aman" 
                                        aria-describedby="emailHelp" value="{{ $data->qty_ikan_aman }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Kuantidade Ikan Inan Diminuidu</label>
                                    <input type="text" name="qty_ikan_inan" itemprop="qty_ikan_inan" class="form-control" id="qty_ikan_inan" 
                                        aria-describedby="emailHelp" value="{{ $data->qty_ikan_inan }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Diminuidu</label>
                                    <input type="text" name="total_diminui" itemprop="total_diminui" class="form-control" id="total_diminui" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->total_diminui }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Ikan Rezerva</label><br>
                                    <select class="form-select" name="ikan_rezerva" aria-label="Default select example">
                                        {{-- <option selected>Hili Jerasaun</option> --}}
                                        <option selected> {{ $data->ikan_rezerva }} </option>
                                        <option value="iha">Iha</option>
                                        <option value="la iha">La iha</option>
                                    </select>
                                </div>
                                {{-- <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Aman</label>
                                    <input type="text" name="qty_ikan_aman" class="form-control" id="qty_ikan_aman" value="{{ $data->ikann['kuantidade_ikan_aman'] }}">
                                </div> --}}
                                {{-- <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Iman</label>
                                    <input type="text" name="qty_ikan_inan" class="form-control" id="qty_ikan_inan"  value="{{ $data->ikann['kuantidade_ikan_inan'] }}">
                                </div> --}}
                               <div class="row">
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Troka Ikan Aman</label>
                                    <input type="text" name="total_troka_m" itemprop="total_troka_m" class="form-control" id="total_troka_m" 
                                        aria-describedby="emailHelp" value="{{ $data->total_troka_m }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Troka Ikan Inan</label>
                                    <input type="text" name="total_troka_f" itemprop="total_troka_f" class="form-control" id="total_troka_f" 
                                        aria-describedby="emailHelp" value="{{ $data->total_troka_f }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Troka Ikan</label>
                                    <input type="text" name="total_ikan_troka" itemprop="total_ikan_troka" class="form-control" id="total_ikan_troka" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->total_ikan_troka }}">
                                </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan Aman Atual</label>
                                    <input type="text" name="total_ikan_atual_m" class="form-control" id="total_ikan_atual_m"
                                        aria-describedby="emailHelp" value="{{ $data->total_ikan_atual_m }}" readonly>
                                        @error('total_ikan_atual_m')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan Inan Atual</label>
                                    <input type="text" name="total_ikan_atual_f" class="form-control" id="total_ikan_atual_f"
                                        aria-describedby="emailHelp" value="{{ $data->total_ikan_atual_f }}" readonly>
                                        @error('total_ikan_atual_f')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan Atual</label>
                                    <input type="text" name="total_atual" class="form-control" id="total_atual"
                                        aria-describedby="emailHelp" value="{{ $data->total_atual }}" readonly>
                                        @error('total_atual')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center"><button type="submit" class="btn btn-info">Submete</button></div>                                     
                          
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
        function total(val){
            var t=val;
            document.getElementById("totalm").value=t;
        }
    </script>
    <script>
        function total1(val){
            var t=val;
            document.getElementById("totalf").value=t;
        }
    </script>
    <script>
        $(document).on('blur','#subtotal', function(){
        let totalm = parseFloat($('#totalm').val())
        let totalf = parseFloat($('#totalf').val())
        let rezultadu = totalm + totalf
        $('#subtotal').val(rezultadu)
    })
    $(document).on('blur','#totalf', function(){
        let totalm = parseFloat($('#totalm').val())
        let totalf = parseFloat($('#totalf').val())
        let rezultadu = totalm + totalf 
        $('#subtotal').val(rezultadu)
    })
    $(document).on('blur','#totalm', function(){
        let totalm = parseFloat($('#totalm').val())
        let totalf = parseFloat($('#totalf').val())
        let rezultadu = totalm + totalf
        $('#subtotal').val(rezultadu)
    })
    </script>
    <script>
        $(document).on('blur','#total_diminui', function(){
        let qty_ikan_aman = parseFloat($('#qty_ikan_aman').val())
        let qty_ikan_inan = parseFloat($('#qty_ikan_inan').val())
        let rezultadu = qty_ikan_aman + qty_ikan_inan
        $('#total_diminui').val(rezultadu)
    })
    $(document).on('blur','#qty_ikan_inan', function(){
        let qty_ikan_aman = parseFloat($('#qty_ikan_aman').val())
        let qty_ikan_inan = parseFloat($('#qty_ikan_inan').val())
        let rezultadu = qty_ikan_aman + qty_ikan_inan 
        $('#total_diminui').val(rezultadu)
    })
    $(document).on('blur','#qty_ikan_aman', function(){
        let qty_ikan_aman = parseFloat($('#qty_ikan_aman').val())
        let qty_ikan_inan = parseFloat($('#qty_ikan_inan').val())
        let rezultadu = qty_ikan_aman + qty_ikan_inan
        $('#total_diminui').val(rezultadu)
    })
    </script>
    <script>
        $(document).on('blur','#total_ikan_atual_m', function(){
        let totalm = parseFloat($('#totalm').val())
        let qty_ikan_aman = parseFloat($('#qty_ikan_aman').val())
        let total_troka_m = parseFloat($('#total_troka_m').val())
        let rezultadu = (totalm - qty_ikan_aman) + total_troka_m
        $('#total_ikan_atual_m').val(rezultadu)
    })

    $(document).on('blur','#totalm', function(){
        let totalm = parseFloat($('#totalm').val())
        let qty_ikan_aman = parseFloat($('#qty_ikan_aman').val())
        let total_troka_m = parseFloat($('#total_troka_m').val())
        let rezultadu = (totalm - qty_ikan_aman) + total_troka_m
        $('#total_ikan_atual_m').val(rezultadu)
    })
    $(document).on('blur','#qty_ikan_aman', function(){
        let totalm = parseFloat($('#totalm').val())
        let qty_ikan_aman = parseFloat($('#qty_ikan_aman').val())
        let total_troka_m = parseFloat($('#total_troka_m').val())
        let rezultadu = (totalm - qty_ikan_aman) + total_troka_m
        $('#total_ikan_atual_m').val(rezultadu)
    })
    $(document).on('blur','#total_troka_m', function(){
        let totalm = parseFloat($('#totalm').val())
        let qty_ikan_aman = parseFloat($('#qty_ikan_aman').val())
        let total_troka_m = parseFloat($('#total_troka_m').val())
        let rezultadu = (totalm - qty_ikan_aman) + total_troka_m
        $('#total_ikan_atual_m').val(rezultadu)
    })
    </script>
    <script>
        $(document).on('blur','#total_ikan_atual_f', function(){
        let totalf = parseFloat($('#totalf').val())
        let qty_ikan_inan = parseFloat($('#qty_ikan_inan').val())
        let total_troka_f = parseFloat($('#total_troka_f').val())
        let rezultadu = (totalf - qty_ikan_inan) + total_troka_f
        $('#total_ikan_atual_f').val(rezultadu)
    })

    $(document).on('blur','#totalf', function(){
        let totalf = parseFloat($('#totalf').val())
        let qty_ikan_inan = parseFloat($('#qty_ikan_inan').val())
        let total_troka_f = parseFloat($('#total_troka_f').val())
        let rezultadu = (totalf - qty_ikan_inan) + total_troka_f
        $('#total_ikan_atual_f').val(rezultadu)
    })
    $(document).on('blur','#qty_ikan_inan', function(){
        let totalf = parseFloat($('#totalf').val())
        let qty_ikan_inan = parseFloat($('#qty_ikan_inan').val())
        let total_troka_f = parseFloat($('#total_troka_f').val())
        let rezultadu = (totalf - qty_ikan_inan) + total_troka_f
        $('#total_ikan_atual_f').val(rezultadu)
    })
    $(document).on('blur','#total_troka_f', function(){
        let totalf = parseFloat($('#totalf').val())
        let qty_ikan_inan = parseFloat($('#qty_ikan_inan').val())
        let total_troka_f = parseFloat($('#total_troka_f').val())
        let rezultadu = (totalf - qty_ikan_inan) + total_troka_f
        $('#total_ikan_atual_f').val(rezultadu)
    })
    </script>
    <script>
        $(document).on('blur','#total_ikan_troka', function(){
        let total_troka_m = parseFloat($('#total_troka_m').val())
        let total_troka_f = parseFloat($('#total_troka_f').val())
        let rezultadu = total_troka_m + total_troka_f 
        $('#total_ikan_troka').val(rezultadu)
    })

    $(document).on('blur','#total_troka_m', function(){
        let total_troka_m = parseFloat($('#total_troka_m').val())
        let total_troka_f = parseFloat($('#total_troka_f').val())
        let rezultadu = total_troka_m + total_troka_f
        $('#total_ikan_troka').val(rezultadu)
    })
    $(document).on('blur','#total_troka_f', function(){
        let total_troka_m = parseFloat($('#total_troka_m').val())
        let total_troka_f = parseFloat($('#total_troka_f').val())
        let rezultadu = total_troka_m + total_troka_f 
        $('#total_ikan_troka').val(rezultadu)
    })
    </script>
    <script>
        $(document).on('blur','#total_atual', function(){
        let subtotal = parseFloat($('#subtotal').val())
        let total_diminui = parseFloat($('#total_diminui').val())
        let total_ikan_troka = parseFloat($('#total_ikan_troka').val())
        let rezultadu = (subtotal - total_diminui) + total_ikan_troka
        $('#total_atual').val(rezultadu)
    })

    $(document).on('blur','#subtotal', function(){
        let subtotal = parseFloat($('#subtotal').val())
        let total_diminui = parseFloat($('#total_diminui').val())
        let total_ikan_troka = parseFloat($('#total_ikan_troka').val())
        let rezultadu = (subtotal - total_diminui) + total_ikan_troka
        $('#total_atual').val(rezultadu)
    })
    $(document).on('blur','#total_diminui', function(){
        let subtotal = parseFloat($('#subtotal').val())
        let total_diminui = parseFloat($('#total_diminui').val())
        let total_ikan_troka = parseFloat($('#total_ikan_troka').val())
        let rezultadu = (subtotal - total_diminui) + total_ikan_troka
        $('#total_atual').val(rezultadu)
    })
    $(document).on('blur','#total_ikan_troka', function(){
        let subtotal = parseFloat($('#subtotal').val())
        let total_diminui = parseFloat($('#total_diminui').val())
        let total_ikan_troka = parseFloat($('#total_ikan_troka').val())
        let rezultadu = (subtotal - total_diminui) + total_ikan_troka
        $('#total_atual').val(rezultadu)
    })
    </script>
</body>

@endsection
