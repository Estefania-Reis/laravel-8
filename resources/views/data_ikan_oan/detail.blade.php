@extends('layout.admin')
@push('css')
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<br>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container m-2 ">
        <div class="row">
            <div class="col-auto">
                <a href="../../data_ikan/index" class="btn btn-info"><i class="nav-icon fas fa-arrow-circle-left"></i> Ikan (Brood)</a>
            </div>
            <div class="col-auto">
                <a href="/data_ikan/edit/{{ $data->id }}" class="btn1 btn-info fa fa-edit" style="font-size:20px"></a>
            </div>
            <div class="col-auto">
                <a href="#" class="btn1 btn-danger delete" data-tipu="{{ $data->id_ikanbrood }}"
                    data-id="{{ $data->id }}"><i class="material-icons" style="font-size:24px">delete</i></a>
            </div> 
        </div>
        
        
        {{-- {{ Session::get('halaman_url') }} --}}
        <div class="row g-3 align-items-center mt-2">
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <div class="row">  
                            <h4 style="text-align: center">Dadus Detallu</h4>
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Id Ikan (Oan/Nursery): {{ $data->id_ikanbrood }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Data: {{ date('j-n-Y', strtotime( $data->data)) }}</label>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Tinan: {{ $data->tinan }}</label>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Aman: {{ $data->total_m }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Inan: {{ $data->total_f }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan: {{ $data->total }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Kolam: {{ $data->kolam_id }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Hapa: {{ $data->hapa_id }}</label>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Tipu Ikan: {{ $data->tipu_ikan }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Orijem: {{ $data->nasaun }}</label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Jerasaun: {{ $data->jerasaun }}</label>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Kodigu Familia: {{ $data->codigo_familia }}</label>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" name="data_dim" class="form-label">Data Diminuisaun: @if (old('data_dim', $data->data_dim)== null)
                                    {{ $data->data_dim }}
                                @else
                                {{ date('j-n-Y', strtotime($data->data_dim)) }}
                                @endif </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Tipu Diminuisaun: {{ $data->tipu_dim }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Razaun Diminuidu: {{ $data->razaun }}</label>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Aman Diminuidu: {{ $data->qty_dim_m }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Kuantidade Ikan Inan Diminuidu: {{ $data->qty_dim_f }}</label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Diminuidu: {{ $data->total_dim }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Ikan Aman Rezerva: {{ $data->qty_rez_m }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Ikan Inan Rezerva: {{ $data->qty_rez_f }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Rezerva: {{ $data->total_rez }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Aman Rezerva: {{ $data->total_rez_m }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Inan Rezerva: {{ $data->total_rez_f }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Sub Total Ikan Rezerva: {{ $data->sub_total_rez }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Ikan Aman Atual: {{ $data->qty_atual_m }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Ikan Inan Atual: {{ $data->qty_atual_f }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Total Ikan Atual: {{ $data->total_atual }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- {{ $data->links() }} --}}
        </div>
    </div>

</div>

 
@endsection

@push('scripts')
    
 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>
<script>
    $('.delete').click(function () {
        var ikan_tipu = $(this).attr('data-tipu');
        var ikanid = $(this).attr('data-id');

        swal({
            title: "Iha Serteza ?",
            text: "Ita sei hamos dadus ikan ho id " + ikan_tipu + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deleteikan/" + ikanid + ""
                    swal("Dadus konsege hamos ona", {
                        icon: "success",
                    });
                } else {
                    swal("Kansela hamos dadus");
                }
            });
    });
</script>

<script>
    @if (Session:: has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif

</script>
@endpush