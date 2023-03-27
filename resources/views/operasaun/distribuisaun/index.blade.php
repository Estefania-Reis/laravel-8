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

<div class="wrapper">
    <!-- Content Header (Page header) -->
    <div class="container m-2 "><br>
        
        {{-- {{ Session::get('halaman_url') }} --}}
        <div class="row g-3 align-items-center mt-2">
            <div class="col-auto ml-3">
                @can('tadmin')
                <a href="/operasaun/distribuisaun/aumentadata" class="btn btn-info">Adisiona +</a>
                @endcan
            </div>
            <div class="col-auto">
                <a href="/export-distribuisaun" class="btn btn-danger">Export PDF</a>
            </div>
            <div class="col">
                <a href="/exportexcel" class="btn btn-success">Export Excel</a>
            </div>
            <div class="col-auto mr-4">
                <form action="/operasaun/distribuisaun/index" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline" placeholder="search">
                </form>
            </div>

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
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id Distribuisaun</th>
                        <th scope="col">Data</th>
                        <th scope="col">Id Benefisiariu Individual</th>
                        <th scope="col">Id Benefisiariu Grupo</th>
                        <th scope="col">Total Ikan M. Sex</th>
                        <th scope="col">Total Ikan N. M. Sex</th>
                        <th scope="col">Total Ikan Oan</th>
                        <th scope="col">Objetivu</th>
                        <th scope="col">Total Kolam</th>
                        <th scope="col">Total Plastik</th>
                        <th scope="col">Total Ikan/Plastik</th>
                        <th scope="col">Proposta</th>
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
                        <td>{{ $row->id_distribuisaun }}</td>
                        <td>{{ $row->data->format('j-n-Y')}}</td>
                        @if ($row->klienteIndividual_id !== 0)
                        <td>{{ $row->klienteind['id_kliente'] }}</td>
                        @else
                         <td> - </td>   
                        @endif
                        @if ($row->klienteGrupo_id !== 0)
                        <td>{{ $row->klientegrupo['id_klientegrupo'] }}</td>
                        @else
                         <td> - </td>   
                        @endif
                        <td>{{ $row->total_m_sex }}</td>
                        <td>{{ $row->total_n_sex }}</td>
                        <td>{{ $row->total_ikan_oan}}</td>
                        <td>{{ $row->objetivu }}</td>
                        <td>{{ $row->total_kolam }}</td>
                        <td>{{ $row->total_plastik }}</td>
                        <td>{{ $row->total_ikanplastik }}</td>
                        <td>
                            <img src="{{ asset('storage/proposta/'.$row->proposta) }}" alt="proposta" style="width: 40px;" class="brand-image img-square elevation-3">
                        </td>
                        @can('tadmin')
                        <td>
                            <a href="/operasaun/distribuisaun/edit/{{ $row->id }}" class="btn1 btn-info fa fa-edit" style="font-size:14px"></a>
                            <a href="#" class="btn1 btn-danger delete" data-id="{{ $row->id }}"
                                data-naran="{{ $row->id_distribuisaun }}"><i class="material-icons" style="font-size:18px">delete</i></a>
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
        var disid = $(this).attr('data-id');
        var distid = $(this).attr('data-naran');

        swal({
            title: "Iha Serteza ?",
            text: "Ita sei hamos dadus ho id " + distid + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletedist/" + disid + " ",
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