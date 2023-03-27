@extends('layout.admin')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<body>
    <div class="wrapper mt-5">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size: 20px">
                            <strong>Adisiona Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insertdataisrt" method="POST" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1" class="form-label">Data</label>
                                    <input type="date" name="data_husik" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('data_husik')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>           
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Id Kolam Srt</label><br>
                                    <select class="form-select" name="kolam_id" aria-label="Default select example">
                                        @foreach ($datakolam as $data)
                                            <option selected value="{{ $data->id_kolam }}">{{ $data->id_kolam }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Id Hapa</label><br>
                                    <select class="form-select" name="hapa_id" aria-label="Default select example">
                                        @foreach ($datahapa as $data)
                                            <option selected value="{{ $data->id_hapa }}">{{ $data->id_hapa }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Total Ikan SRT</label>
                                    <input type="text" name="total_ikan_srt" class="form-control" id="total_ikan_srt"
                                        aria-describedby="emailHelp" value="0">
                                        @error('total_ikan_srt')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div> 
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-primary">Submete</button>
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
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $(function() {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function(){
            $('#kolam_id').on('change', function(){
                let kolam_id = $('#kolam_id').val();
                $.ajax({
                    type: 'POST',
                    url : "{{ route('getHapa') }}",
                    data: {kolam_id:kolam_id},
                    cache : false,

                    success: function(msg){
                        $('#hapa_id').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })

        })
    </script>
</body>

@endsection