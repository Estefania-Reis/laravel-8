@extends('layout.admin')

@section('content')
<body>
    <div class="wrapper">
    
    
<br><br><br>
   
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8 ml-4">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertikanoanmate" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Series/Kode</label><br>
                                    <select class="form-select" name="series_id" id="series_id" aria-label="Default select example">
                                        @foreach ($dataseries as $data)
                                            <option selected value="{{ $data->id }}">{{ $data->series }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="date" name="data" class="form-control" id="data"
                                        aria-describedby="emailHelp">
                                        @error('data')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div> 
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Ikan Nursery</label><br>    
                                    <select class="form-select" name="nursery_id" aria-label="Default select example">
                                        @foreach ($dataikan as $data)
                                            <option selected value="{{ $data->id_ikanoan }}">{{ $data->id_ikanoan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Nursery</label>
                                    <select class="form-select"  id="nursery_id" onChange="total_ikannursery(this.value)" aria-label="Default select example">
                                        <option value="0" selected>hili</option>
                                    @foreach ($dataikan as $data)
                                        <option value="{{ $data->total_ikan_oan }}">{{ $data->id_ikanoan }}</option>
                                    @endforeach
                                </select>
                                    <input type="text" name="total_nursery"  class="form-control" id="total_nursery" 
                                        aria-describedby="emailHelp" readonly value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1" class="form-label">Id Distribuisaun</label><br>    
                                    <select class="form-select" name="distribuisaun_id" aria-label="Default select example">
                                        @foreach ($datadis as $data)
                                            <option selected value="{{ $data->id_distribuisaun }}">{{ $data->id_distribuisaun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mr-3">
                                    <label for="exampleInputEmail1"class="form-label">Total Ikan Distribuidu</label>
                                    <select class="form-select"  id="distribuisaun_id" onChange="total_distribuisaun(this.value)" aria-label="Default select example">
                                        <option value="0" selected>hili</option>
                                    @foreach ($datadis as $data)
                                        <option value="{{ $data->total_ikan_oan }}">{{ $data->id_distribuisaun }}</option>
                                    @endforeach
                                </select>
                                    <input type="text" name="total_distribuisaun"  class="form-control" id="total_distribuisaun" 
                                        aria-describedby="emailHelp" readonly value="0">
                                </div>
                                <div class="col-5 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan Diminuidu</label>
                                    <input type="text" name="total_diminuisaun" class="form-control" id="total_diminuisaun"
                                        aria-describedby="emailHelp">
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
        function total_ikannursery(val){
            var t=val;
            document.getElementById("total_nursery").value=t;
        }
    </script>
    <script>
        function total_distribuisaun(val){
            var t=val;
            document.getElementById("total_distribuisaun").value=t;
        }
    </script>
    <script>
        $(document).on('blur','#total_diminuisaun', function(){
        let total_nursery = parseFloat($('#total_nursery').val())
        let total_distribuisaun = parseFloat($('#total_distribuisaun').val())
        let rezultadu = total_nursery - total_distribuisaun
        $('#total_diminuisaun').val(rezultadu)
    })
    $(document).on('blur','#total_distribuisaun', function(){
        let total_nursery = parseFloat($('#total_nursery').val())
        let total_distribuisaun = parseFloat($('#total_distribuisaun').val())
        let rezultadu = total_nursery - total_distribuisaun 
        $('#total_diminuisaun').val(rezultadu)
    })
    $(document).on('blur','#total_nursery', function(){
        let total_nursery = parseFloat($('#total_nursery').val())
        let total_distribuisaun = parseFloat($('#total_distribuisaun').val())
        let rezultadu = total_nursery - total_distribuisaun
        $('#total_diminuisaun').val(rezultadu)
    })
    </script>
</body>

@endsection