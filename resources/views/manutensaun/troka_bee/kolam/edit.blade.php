@extends('layout.admin')

@section('content')

<body>
    <div class="wrapper">
    <h1 class="text-center mb-4">Edit Dadus</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updatedatatbkolam/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Staff Responsavel</label>
                                <select class="form-select" name="employee_id" aria-label="Default select example">
                                    {{-- <option selected value="{{ $data->id }}">{{ $data->naruk }}</option> --}}
                                    @foreach ($dataemp as $data1)
                                        @if(old('employee_id', $data->employee_id) == $data1->id)
                                        <option value="{{ $data1->id }}">{{ $data1->naran }}</option>
                                        @else
                                        <option value="{{ $data1->id }}">{{ $data1->naran }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Id Kolam</label>
                                <select class="form-select" name="kolam_id" aria-label="Default select example">
                                    {{-- <option selected value="{{ $data->naruk }}">{{ $data->naruk }}</option> --}}
                                    @foreach ($datakol as $data2)
                                    @if(old('kolam_id', $data->kolam_id) == $data2->id)
                                        <option value="{{ $data2->id }}">{{ $data2->id }}</option>
                                        @else
                                        <option value="{{ $data2->id }}">{{ $data2->id }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Oras Troka Bee</label>
                                <input type="text" name="oras_tb" class="form-control" id="oras_tb"
                                    aria-describedby="emailHelp" value="{{ $data->oras_tb }}">
                                    @error('oras_tb')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Data Troka Bee</label>
                                <input type="text" name="data_tb" class="form-control" id="data_tb"
                                    aria-describedby="emailHelp" value="{{ $data->data_tb }}">
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

</body>

@endsection