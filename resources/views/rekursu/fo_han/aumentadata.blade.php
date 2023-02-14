@extends('layout.admin')

@section('content')

<body>
    <div class="content-wrapper mt-5">
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
                        <form action="/inserthahan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Naran Hahan</label>
                                <input type="text" name="naran" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('naran')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Unidade</label>
                                    <input type="text" name="unidade" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        @error('unidade')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            </div>   
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Kuantidade</label>
                                    <input type="text" name="kuantidade" class="form-control" id="kuantidade"
                                        aria-describedby="emailHelp" value="0">
                                        @error('kuantidade')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Presu</label>
                                    <input type="text" name="presu" class="form-control" id="presu"
                                        aria-describedby="emailHelp" value="0">
                                        @error('presu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Total Presu</label>
                                    <input type="text" name="total_presu" class="form-control" id="total_presu"
                                        aria-describedby="emailHelp" readonly>
                                        @error('total_presu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            </div>  
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data Sosa</label>
                                <input type="date" name="data" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('data')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Data Hahan Expire</label>
                                <input type="date" name="data_hahan_expire" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('data_hahan_expire')
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

    {{-- script below is for selecpicker from bootstrap version 4 --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).on('blur','#total_presu', function(){
        let kuantidade = parseFloat($('#kuantidade').val())
        let presu = parseFloat($('#presu').val())
        let rezultadu = kuantidade * presu
        $('#total_presu').val(rezultadu)
    })
    $(document).on('blur','#kuantidade', function(){
        let kuantidade = parseFloat($('#kuantidade').val())
        let presu = parseFloat($('#presu').val())
        let rezultadu = kuantidade * presu
        $('#total_presu').val(rezultadu)
    })
    $(document).on('blur','#presu', function(){
        let kuantidade = parseFloat($('#kuantidade').val())
        let presu = parseFloat($('#presu').val())
        let rezultadu = kuantidade * presu
        $('#total_presu').val(rezultadu)
    })

</script>

</body>

@endsection