@extends('layout.admin')

@section('content')

<body>
    <div class="content-wrapper mt-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="vertical-center" style="font-size: 20px">
                            <strong>Hadia Dadus</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/update-suco/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Series/Kode</label><br>
                                    <select class="form-select" name="series_id" id="series_id" aria-label="Default select example">
                                        @foreach ($dataseries as $datas)
                                        @if (old('series_id', $data->series_id) == $datas->id)
                                        <option selected value="{{ $datas->id }}">{{ $datas->series }}</option>
                                        @else
                                        <option value="{{ $datas->id }}">{{ $datas->series }}</option>
                                        @endif
                                        @endforeach
                                        </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Municipio</label><br>
                                    <select class="form-select" name="municipio_id" id="municipio_id" aria-label="Default select example">
                                        @foreach ($datamunicipio as $datamun)
                                        @if (old('municipio_id', $data->municipio_id) == $datamun->id)
                                        <option selected value="{{ $datamun->id }}">{{ $datamun->naran }}</option>
                                        @else
                                        <option value="{{ $datamun->id }}">{{ $datamun->naran }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Posto Administrativo</label><br>
                                    <select class="form-select" name="posto_id" id="posto_id" aria-label="Default select example">
                                        @foreach ($dataposto as $datapos)
                                        @if (old('posto_id', $data->posto_id) == $datapos->id)
                                        <option selected value="{{ $datapos->id }}">{{ $datapos->naran }}</option>
                                        @else
                                        <option value="{{ $datapos->id }}">{{ $datapos->naran }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Suco</label>
                                    <input type="text" name="naran" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->naran }}">
                                </div>
                            </div>
                    <div class="card-footer">
                        <div class="vertical-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
crossorigin="anonymous"></script>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

@endsection