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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="ml-2">
            <div class="row">
                @can('tadmin')
            <div class="col-auto">
                <a href="/tambahagama" class="btn btn-info">Adisiona +</a>
            </div>
            @endcan
            <div class="col-auto">
                <a href="/export-relijiaun" class="btn btn-danger">Export PDF</a>
            </div>
            </div>
        </div>  
        {{-- {{ Session::get('halaman_url') }} --}}
            
        <div class="row m-2">
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Relijiaun</th>
                        <th scope="col">Relijiaun</th>
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
                        <td>{{ $row->id_religion }}</td>
                        <td>{{ $row->naran }}</td>
                        @can('tadmin')
                        <td>
                            <a href="/editreligion/{{ $row->id }}" class="btn1 btn-info fa fa-edit" style="font-size:14px"></a>
                            <a href="#" class="btn1 btn-danger delete" data-id="{{ $row->id }}"
                                data-naran="{{ $row->id_religion }}"><i class="material-icons" style="font-size:18px">delete</i></a>
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
                var pegawaiid = $(this).attr('data-id');
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
                            window.location = "/delrel/" + pegawaiid + ""
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