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
                        <form action="/insertdatakolam" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Luan/Largura (m)</label>
                                <input type="text" name="luan" class="form-control" id="luan"
                                    aria-describedby="emailHelp" value=0>
                                    @error('luan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Naruk/Comprimento (m)</label>
                                <input type="text" name="naruk" class="form-control" id="naruk"
                                    aria-describedby="emailHelp" value=0>
                                    @error('naruk')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Aas/Altura Bee (m)</label>
                                <input type="text" name="altura" class="form-control" id="altura"
                                    aria-describedby="emailHelp" value=0>
                                    @error('altura')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Volume Bee (m kubiku)</label>
                                <input type="text" name="volume_bee" class="form-control" id="volume_bee"
                                    aria-describedby="emailHelp" readonly>
                                    {{-- @error('volume_bee')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                            </div> 
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Status Kolam</label>
                                <select class="form-select" name="status_kolam" aria-label="Default select example">
                                    <option selected>Hili Status Atual Kolam</option>
                                    <option value="Diak">Diak</option>
                                    <option value="Aat">Aat</option>
                                    <option value="Aatgrave">Aat Grave</option>
                                    <option value="Manutensaun">Manutensaun</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Observasaun</label>
                                <input type="text" name="observasaun" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Deskreve Kondisaun Status Kolam Nian">
                                    @error('observasaun')
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