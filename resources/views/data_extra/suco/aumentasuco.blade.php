@extends('../layout.admin')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

<body>
    <div class="content-wrapper mt-5">
    <div class="container mb-5">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size:20px;">
                            <strong>Adisiona Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/insertdatasuco" method="POST" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1" class="form-label">Municipio</label><br>
                                    <select class="form-select" name="municipio_id" id="municipio_id" aria-label="Default select example">
                                        @foreach ($datamunicipio as $data)
                                            <option selected value="{{ $data->id }}">{{ $data->naran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Posto Administrativo</label><br>
                                    <select class="form-select" name="posto_id" id="posto_id" aria-label="Default select example">
                                        @foreach ($dataposto as $data)
                                            <option selected value="{{ $data->id }}">{{ $data->naran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Suco</label>
                                    <input type="text" name="naran" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('naran')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
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
    <script>
        $(function() {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function(){
            $('#municipio_id').on('change', function(){
                let municipio_id = $('#municipio_id').val();
                $.ajax({
                    type: 'POST',
                    url : "{{ route('getPosto2') }}",
                    data: {municipio_id:municipio_id},
                    cache : false,

                    success: function(msg){
                        $('#posto_id').html(msg);
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