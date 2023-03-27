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
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="row g-3 align-items-center mb-1">
           
                <div class="col-auto ml-3">
                   
                    <a href="/insertserie" class="btn btn-info">Adisiona +</a>
                    
                </div> 
                <div class="col-auto">
                    <a href="/export-kodigu" class="btn btn-danger">Export PDF</a>
                </div>
                <div class="col">
                    <a href="/exportexcel" class="btn btn-success">Export Excel</a>
                </div>
                <div class="col-auto mr-4">
                    <form action="/rekursu/hahan_ikan/index" method="GET">
                        <input type="search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline" placeholder="search">
                    </form>
                </div>
            </div> 
            
        {{-- {{ Session::get('halaman_url') }} --}}
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Series</th>
                        <th scope="col">Deskrisaun</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->series }}</td>
                        <td>{{ $row->deskrisaun }}</td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $data->links() }}
    </div>

    </div>

 
</body>
@endsection
