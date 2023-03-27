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
                    <form action="/updateikantolund/{{ $data->id }}" method="POST" enctype="multipart/form-data">
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
                                <div class="mb-3 mr-3 ml-3">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="text" name="data" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ date('j-n-Y', strtotime($data->data)) }}">
                                </div> 
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label" >Id Ikan Tolun</label><br>
                                    <select class="form-select"  name="ikantolun_id" aria-label="Default select example">
                                            <option >hili</option>
                                        @foreach ($dataikantolun as $datait)
                                        @if (old('ikantolun_id', $data->ikantolun_id) == $datait->id_ikantolun)
                                        <option selected value="{{ $datait->id_ikantolun }}">{{ $datait->id_ikantolun }}</option>
                                        @else
                                        <option value="{{ $datait->id_ikantolun }}">{{ $datait->id_ikantolun }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Tolun</label>
                                    <select class="form-select"  id="ikantolun_id" onChange="total_ikantolun1(this.value)" aria-label="Default select example">
                                        <option value="0" >hili</option>
                                    @foreach ($dataikantolun as $dataitl)
                                    @if (old('ikantolun_id', $data->ikantolun_id) == $dataitl->id_ikantolun)
                                    <option selected value="{{ $dataitl->total_ikan_tolun }}">{{ $dataitl->id_ikantolun }}</option>
                                    @else
                                    <option value="{{ $dataitl->total_ikan_tolun }}">{{ $dataitl->id_ikantolun }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                    <input type="text" name="total_ikantolun" itemprop="total_ikantolun" class="form-control" id="total_ikantolun" 
                                        aria-describedby="emailHelp" readonly value="{{ $data->total_ikantolun }}">
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Ikan SRT</label><br>
                                    <select class="form-select"  name="srt_id" aria-label="Default select example">
                                        
                                        @foreach ($datasrt as $datais)
                                        @if (old('srt_id', $data->srt_id) == $datais->id_ikansrt)
                                        <option selected value="{{ $datais->id_ikansrt }}">{{ $datais->id_ikansrt }}</option>
                                        @else
                                        <option value="{{ $datais->id_ikansrt }}">{{ $datais->id_ikansrt }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            
                        <div class="form-row">    
                            <div class="mb-3 mr-3">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Srt</label>
                                <select class="form-select"  id="srt_id" onChange="total_ikansrt1(this.value)" aria-label="Default select example">
                                    <option value="0">hili</option>
                                    @foreach ($datasrt as $dataisr)
                                    @if (old('srt_id', $data->srt_id) == $dataisr->id_ikansrt)
                                    <option selected value="{{ $dataisr->total_ikan_srt }}">{{ $dataisr->id_ikansrt }}</option>
                                    @else
                                    <option value="{{ $dataisr->total_ikan_srt }}">{{ $dataisr->id_ikansrt }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <input type="text" name="total_srt" class="form-control" id="total_srt" aria-describedby="emailHelp" readonly value="0">
                            </div>
                            <div class="mb-3 mr-3">
                                <label for="exampleInputEmail1" class="form-label">Total Diminuisaun</label>
                                <input type="text" name="total_diminuisaun" class="form-control" id="total_diminuisaun"
                                    aria-describedby="emailHelp" value="{{ $data->total_diminuisaun }}">
                            </div>
                        </div>      
                          <button type="submit" class="btn btn-primary">Submete</button>
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
        function total_ikantolun1(val){
            var t=val;
            document.getElementById("total_ikantolun").value=t;
        }
    </script>
    <script>
        function total_ikansrt1(val){
            var t=val;
            document.getElementById("total_srt").value=t;
        }
    </script>
    <script>
        $(document).on('blur','#total_diminuisaun', function(){
        let total_ikantolun = parseFloat($('#total_ikantolun').val())
        let total_srt = parseFloat($('#total_srt').val())
        let rezultadu = total_ikantolun - total_srt
        $('#total_diminuisaun').val(rezultadu)
    })
    $(document).on('blur','#total_srt', function(){
        let total_ikantolun = parseFloat($('#total_ikantolun').val())
        let total_srt = parseFloat($('#total_srt').val())
        let rezultadu = total_ikantolun - total_srt 
        $('#total_diminuisaun').val(rezultadu)
    })
    $(document).on('blur','#total_ikantolun', function(){
        let total_ikantolun = parseFloat($('#total_ikantolun').val())
        let total_srt = parseFloat($('#total_srt').val())
        let rezultadu = total_ikantolun - total_srt
        $('#total_diminuisaun').val(rezultadu)
    })
    </script>
</body>

@endsection