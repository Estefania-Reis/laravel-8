@extends('layout.admin')
{{-- local css style --}}

@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          {{-- <h3 class="mt-3 text-center"><strong>Estrutura Funcionario Pescas e Aquicultura Centro Viveiros Gleno Ermera</strong> </h3> --}}
          <div class="tree">
            {{-- @foreach ($data as $index => $row) --}}
            <ul>
              <br>
              <li class="a"> <a href="#">
                @if ($data != null)
                  <img src="{{ asset('storage/fotopegawai/'.$data->foto) }}">
                @else
                  <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                @endif
                @if ($data != null)
                <h6 class="text-light"style="font-size: 12px">{{ $data->naran }}</h6>
                @else
                <h6 class="text-light"style="font-size: 12px">Naran Chefe Dep.</h6>
                @endif
                <span>Chefe Departamento</span></a>
              <ul>
                <li><a href="#">
                  @if ($data1 != null)
                  <img src="{{ asset('storage/fotopegawai/'.$data1->foto) }}" alt="tekniku">
                  @else 
                  <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                  @endif
                  @if ($data1 != null)
                  <h6 class="text-light" style="font-size: 12px">{{ $data1->naran }}</h6>
                  @else
                  <h6 class="text-light" style="font-size: 12px">Naran Responsavel Centro</h6>
                  @endif
                  <span>Responsavel Centro</span></a>
                <ul>
                  <li> <a href="#">
                    @if ($data2 != null)
                    <img src="{{ asset('storage/fotopegawai/'.$data2->foto) }}" alt="tekniku">
                    @else 
                    <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                    @endif
                    @if ($data2 != null)
                    <h6 class="text-light"style="font-size: 12px">{{ $data2->naran }}</h6>
                    @else
                    <h6 class="text-light"style="font-size: 12px">Naran TA 1</h6>
                    @endif
                    @if($data8 != null)
                    <img src="{{ asset('storage/fotopegawai/'.$data8->foto) }}" class="d-inline">
                    @else
                    <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                    @endif
                    @if($data8 != null)
                    <h6 class="text-light"style="font-size: 12px">{{ $data8->naran }}</h6>
                    @else
                    <h6 class="text-light"style="font-size: 12px">Naran TA 2</h6>
                    @endif
                    <span>Tekniku Administrasaun</span></a> </li>

                  <li> <a href="#">
                    @if ($data3 != null)
                    <img src="{{ asset('storage/fotopegawai/'.$data3->foto) }}" alt="tekniku">
                    @else 
                    <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                    @endif
                    @if ($data3 != null)
                    <h6 class="text-light"style="font-size: 12px">{{ $data3->naran }}</h6>
                    @else
                    <h6 class="text-light"style="font-size: 12px">Naran Tekniku</h6>
                    @endif
                    <span>Tekniku (Brood Fish)</span></a> </li>

                  <li> <a href="#">
                    @if ($data4 != null)
                    <img src="{{ asset('storage/fotopegawai/'.$data4->foto) }}" alt="tekniku">
                    @else 
                    <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                    @endif
                    @if ($data4 != null)
                    <h6 class="text-light"style="font-size: 12px">{{ $data4->naran }}</h6>
                    @else
                    <h6 class="text-light"style="font-size: 12px">Naran Tekniku</h6>
                    @endif
                    <span>Tekniku (Incubator)</span></a> </li>

                  <li> <a href="#">
                    @if ($data5 != null)
                    <img src="{{ asset('storage/fotopegawai/'.$data5->foto) }}" alt="tekniku">
                    @else 
                    <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                    @endif
                    @if ($data5 != null)
                    <h6 class="text-light"style="font-size: 12px">{{ $data5->naran }}</h6>
                    @else
                    <h6 class="text-light"style="font-size: 12px">Naran Tekniku</h6>
                    @endif
                    <span>Tekniku (SRT)</span></a> </li>

                  <li> <a href="#">
                    @if ($data6 != null)
                    <img src="{{ asset('storage/fotopegawai/'.$data6->foto) }}" alt="tekniku">
                    @else 
                    <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                    @endif
                    @if ($data6 != null)
                    <h6 class="text-light"style="font-size: 12px">{{ $data6->naran }}</h6>
                    @else
                    <h6 class="text-light"style="font-size: 12px">Naran Tekniku</h6>
                    @endif
                    <span>Tekniku (Nursery)</span></a> </li>

                  <li> <a href="#">
                    @if ($data7 != null)
                    <img src="{{ asset('storage/fotopegawai/'.$data7->foto) }}" alt="tekniku">
                    @else 
                    <img src="{{ asset('storage/fototroka/map.jpg') }}" alt="null">
                    @endif
                    @if ($data7 != null)
                    <h6 class="text-light"style="font-size: 12px">{{ $data7->naran }}</h6>
                    @else
                    <h6 class="text-light"style="font-size: 12px">Naran Tekniku</h6>
                    @endif
                    <span>Tekniku (Water Quality & Disease)</span></a> </li>
               </ul>
                </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  </div>
    </section>
  </div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
crossorigin="anonymous"></script>
  @endsection
  
    
 