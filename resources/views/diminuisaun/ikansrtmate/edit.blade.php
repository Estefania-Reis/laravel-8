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
                    <form action="/updateikansrtmate/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Series/Kode</label><br>
                                    <select class="form-select" name="series_id" id="series_id" aria-label="Default select example">
                                        @foreach ($dataseries as $datas)
                                        @if (old('series_id', $data->series_id)  == $datas->id)
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
                                        aria-describedby="emailHelp" value="{{ date('j-n-Y'), strtotime($data->data) }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Ikan SRT</label><br>
                                    <select class="form-select" name="ikansrt_id" aria-label="Default select example">
                                        @foreach ($dataikan as $datais)
                                        @if (old('ikansrt_id', $data->ikansrt_id) == $datais->id_ikansrt)
                                        <option selected value="{{ $datais->id_ikansrt }}">{{ $datais->id_ikansrt }}</option>
                                        @else
                                        <option value="{{ $datais->id_ikansrt }}">{{ $datais->id_ikansrt }}</option> 
                                        @endif 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan SRT</label> 
                                    <select class="form-select" onChange="total(this.value)" aria-label="Default select example">
                                        <option value="0">hili</option>
                                    @foreach ($dataikan as $datai)
                                    @if (old('ikansrt_id', $data->ikansrt_id) == $datai->id_ikansrt)
                                    <option selected value="{{ $datai->total_ikan_srt }}">{{ $datai->id_ikansrt }}</option>
                                    @else
                                    <option value="{{ $datai->total_ikan_srt }}">{{ $datai->id_ikansrt }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                    <input type="text" name="totalsrt"  class="form-control" id="totalsrt" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->totalsrt }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Ikan Nursery</label><br>
                                    <select class="form-select" name="nursery_id" aria-label="Default select example">
                                        @foreach ($dataikannr as $datain)
                                        @if (old('nursery_id', $data->nursery_id) == $datain->id_ikanoan)
                                        <option selected value="{{ $datain->id_ikanoan }}">{{ $datain->id_ikanoan }}</option>
                                        @else
                                        <option value="{{ $datain->id_ikanoan }}">{{ $datain->id_ikanoan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Nursery</label> 
                                    <select class="form-select" onChange="total1(this.value)" aria-label="Default select example">
                                        <option value="0" >hili</option>
                                    @foreach ($dataikannr as $datainr)
                                    @if (old('nursery_id', $data->nursery_id) == $datainr->id_ikanoan)
                                    <option selected value="{{ $datainr->total_ikan_oan }}">{{ $datainr->id_ikanoan }}</option>
                                    @else
                                    <option value="{{ $datainr->total_ikan_oan }}">{{ $datainr->id_ikanoan }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                    <input type="text" name="total_nursery"  class="form-control" id="total_nursery" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->total_nursery }}">
                                </div>
                                
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan Diminuidu</label>
                                    <input type="text" name="total_diminuisaun" class="form-control" id="total_diminuisaun"
                                        aria-describedby="emailHelp" value="{{ $data->total_diminuisaun }}" readonly>
                                        @error('total_diminuisaun')
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
            document.getElementById("totalsrt").value=t;
        }
    </script>
    <script>
        function total1(val){
            var t=val;
            document.getElementById("total_nursery").value=t;
        }
    </script>
    <script>
        $(document).on('blur','#total_diminuisaun', function(){
        let totalsrt = parseFloat($('#totalsrt').val())
        let total_nursery = parseFloat($('#total_nursery').val())
        let rezultadu = totalsrt - total_nursery 
        $('#total_diminuisaun').val(rezultadu)
    })

    $(document).on('blur','#totalsrt', function(){
        let totalsrt = parseFloat($('#totalsrt').val())
        let total_nursery = parseFloat($('#total_nursery').val())
        let rezultadu = totalsrt - total_nursery
        $('#total_diminuisaun').val(rezultadu)
    })
    $(document).on('blur','#total_nursery', function(){
        let totalsrt = parseFloat($('#totalsrt').val())
        let total_nursery = parseFloat($('#total_nursery').val())
        let rezultadu = totalsrt - total_nursery 
        $('#total_diminuisaun').val(rezultadu)
    })
    </script>

</body>

@endsection