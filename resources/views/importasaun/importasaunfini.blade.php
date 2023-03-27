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
<div class="wrapper vertical-center" >
    <!-- Content Header (Page header) -->

    <div class="container m-1">
        {{-- {{ Session::get('halaman_url') }} --}}
        
        <div class="card mt-5 mb-5">
        <div class="card-header">
        <div class="row g-3 align-items-center">
            @can('tadmin')
            <div class="col-auto ml-3">
                <a href="/aumenta_importasaun_fini" class="btn btn-info">Adisiona +</a>
            </div>
            @endcan
            <div class="col-auto">
                <a href="/export-importasaun-fini" class="btn btn-danger">Export PDF</a>
            </div>
            <div class="col">
                <a href="/exportexcel" class="btn btn-success">Export Excel</a>
            </div>
            <div class="col-auto mr-4">
                <form action="/importasaun_fini" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline" placeholder="naran nasaun">
                </form>
            </div>
            
            {{-- <div class="col-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </button>
            </div> --}}

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
    </div>

    <div class="card-body" style="min-height:375px">
        <div class="row m-2">
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif --}}
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tipu Ikan</th>
                        <th scope="col">Nasaun</th>
                        <th scope="col">Total Nursery M. Sex</th>
                        <th scope="col">Total Nursery N. M. Sex</th>
                        @can('tadmin')
                        <th scope="col">Asaun</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->id_import}}</td>
                        <td>{{ $row->data->format('j-n-Y') }}</td>
                        <td>{{ $row->tipu }}</td>
                        <td>{{ $row->nasaun }}</td>
                        <td>{{ $row->total_msex }}</td>
                        <td>{{ $row->total_nmsex }}</td>
                        @can('tadmin')
                        <td>
                            <a href="/edit_importasaun_fini/{{ $row->id }}" class="btn1 btn-info fa fa-edit" style="font-size:14px"></a>
                            <a href="#" class="btn1 btn-danger delete" data-id="{{ $row->id }}" data-naran="{{ $row->id_import }}">
                                <i class="material-icons" style="font-size:18px">delete</i></a>
                        </td>
                        @endcan
                    </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
    </div>
</div>
</div>

</body>


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
{{-- feather icon --}}
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
{{-- script below is for selecpicker from bootstrap version 4 --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$('.delete').click(function () {
var individualid = $(this).attr('data-id');
var naran = $(this).attr('data-naran');

swal({
    title: "Iha Serteza ?",
    text: "Ita sei hamos dadus ho id " + naran + " ",
    icon: "warning",
    buttons: true,
    dangerMode: true,
})
    .then((willDelete) => {
        if (willDelete) {
            window.location = "/delete_importasaun_fini/" + individualid + " ",
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

 
@endsection


    
 