@extends('layout.admin')
@push('css')
      {{-- selectpicker from bpootstrap 4 --}}
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
 integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush
@section('content')

<body>
<br>
    <h1 class="text-center mb-3 mt-5">Adisiona Dadus</h1>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdatatbkolam" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Staff Responsavel</label>
                                <select class="form-select" name="employee_id" aria-label="Default select example">
                                    <option selected>Hili Staff Responsavel</option>
                                    @foreach ($dataemp as $data)
                                        <option value="{{ $data->id }}">{{ $data->naran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Id Kolam</label>
                                <select class="form-select" name="kolam_id" aria-label="Default select example">
                                    <option selected>Hili Id Kolam</option>
                                    @foreach ($datakol as $data)
                                        <option value="{{ $data->id }}">{{ $data->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Oras Troka Bee</label>
                                <input type="time" name="oras_tb" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('oras_tb')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>  
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Data Troka Bee</label>
                                <input type="date" name="data_tb" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('data_tb')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>    
                            <button type="submit" class="btn btn-primary">Submete</button>
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

    {{-- script below is for selecpicker from bootstrap version 4 --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).on('blur','#volume_bee', function(){
        let luan = parseFloat($('#luan').val())
        // let luan = parseInt($('#luan').val())
        let naruk = parseFloat($('#naruk').val())
        let altura = parseFloat($('#altura').val())
        let rezultadu = luan * naruk * altura
        $('#volume_bee').val(rezultadu)
    })
    $(document).on('blur','#naruk', function(){
        let luan = parseFloat($('#luan').val())
        let naruk = parseFloat($('#naruk').val())
        let altura = parseFloat($('#altura').val())
        let rezultadu = luan * naruk * altura
        $('#volume_bee').val(rezultadu)
    })
    $(document).on('blur','#altura', function(){
        let luan = parseFloat($('#luan').val())
        let naruk = parseFloat($('#naruk').val())
        let altura = parseFloat($('#altura').val())
        let rezultadu = luan * naruk * altura
        $('#volume_bee').val(rezultadu)
    })

</script>

</body>

@endsection