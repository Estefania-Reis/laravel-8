@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <br>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        {{-- <h3 class="text-center embed-responsive" style="color: rgb(236, 236, 228)"><b> Sistema Jestaun Baze de Dadus Husi Departamento Representacao Territorial Pescas e Aquicultura Municipio Ermera</h3> --}}
        <h5>Numero Funcionario Pescas e Aquicultura Municipio Ermera</b></h5>
        <!-- Info boxes -->
        <div class="row" style="color: rgb(220, 223, 226)">
          <div class=""  style="margin-right: 2px; margin-left:7px; margin-top:15px;">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              
              <div class="info-box-content">
                <span class="info-box-text">Total FPA</span>
                <span class="info-box-number">
                  {{ $jumlahpegawai }}
                  <small> Pessoa</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="" style="margin-right: 2px; margin-left:7px; margin-top:15px;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-male"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total FPA Mane</span>
                <span class="info-box-number">{{ $jumlahpegawaicowo }}<small class> Pessoa</small></span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="" style="margin-right: 2px; margin-left:7px; margin-top:15px;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-female"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total FPA Feto</span>
                <span class="info-box-number">{{ $jumlahpegawaicewe }} <small> Pessoa</small></span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
  @push('scripts')
    
 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>