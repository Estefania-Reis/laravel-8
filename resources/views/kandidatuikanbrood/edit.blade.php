@extends('layout.admin')

@section('content')

<body>
    <div class="content-wrapper mt-5">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size: 20px">
                            <strong>Hadia Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="/updatekandidatu_ikan/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
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
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="text" name="data" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ date('j-n-Y', strtotime($data->data)) }}">
                                </div> 
                                <div class="form-group col-md-4">
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
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Kode Hapa</label><br>
                                    <select class="form-select" name="hapa_id" aria-label="Default select example">
                                        @foreach ($datahapa as $datah)
                                        @if (old('hapa_id', $data->hapa_id) == $datah->id_hapa)
                                        <option selected value="{{ $datah->id_hapa }}">{{ $datah->id_hapa }}</option>
                                        @else
                                        <option  value="{{ $datah->id_hapa }}">{{ $datah->id_hapa }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Kodigu Familia</label><br>
                                    <select class="form-select" name="codigo_familia" aria-label="Default select example">
                                        <option selected>{{ $data->codigo_familia }}</option>
                                        <option value="C1">C1</option>
                                        <option value="C2">C2</option>
                                        <option value="C3">C3</option>
                                        <option value="C4">C4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan Aman</label>
                                    <input type="text" name="total_M" class="form-control" id="total_M"
                                        aria-describedby="emailHelp" value="{{ $data->total_M }}">
                                </div>      
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan Inan</label>
                                    <input type="text" name="total_F" class="form-control" id="total_F"
                                        aria-describedby="emailHelp" value="{{ $data->total_F }}">
                                </div>  
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Subtotal</label>
                                    <input type="text" name="subtotal" class="form-control" id="subtotal"
                                        aria-describedby="emailHelp" value="{{ $data->subtotal }}">
                                </div>
                            </div> 
                        </div>
                        <div class="card-footer">
                            <div class="vertical-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
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
        $(document).on('blur','#subtotal', function(){
        let total_M = parseFloat($('#total_M').val())
        let total_F = parseFloat($('#total_F').val())
        let rezultadu = total_M + total_F
        $('#subtotal').val(rezultadu)
    })
    $(document).on('blur','#total_F', function(){
        let total_M = parseFloat($('#total_M').val())
        let total_F = parseFloat($('#total_F').val())
        let rezultadu = total_M + total_F 
        $('#subtotal').val(rezultadu)
    })
    $(document).on('blur','#total_M', function(){
        let total_M = parseFloat($('#total_M').val())
        let total_F = parseFloat($('#total_F').val())
        let rezultadu = total_M + total_F
        $('#subtotal').val(rezultadu)
    })
    </script>
</body>
@endsection