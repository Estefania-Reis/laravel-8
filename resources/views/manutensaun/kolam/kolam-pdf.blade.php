<!DOCTYPE html>
<html>
<head>
  {{-- <link rel="stylesheet" href="{{ asset("css/style.css") }}" /> --}}
  {{-- <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> --}}
  <style>
    @media (orientation: landscape) {
	body {
	  flex-direction: row;
	}
  
  }
  #customers {
	font-family: Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 100%;
  }
  
  #customers td, #customers th {
	border: 1px solid #ddd;
	padding: 8px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
	background-color: #4CAF50;
	color: white;
  }
  table.e{
    width: 100%;
  }
  h2.a {
  margin-top: 0%;
  margin-bottom: 0%;
}
h3.b{
  margin-top: 0%;
  margin-bottom: 0%;
}
td.c{
  column-span: all;
}td.d{
  width: 80%;
}

  </style>
</head>
<body>
<table class="e">
  <tr>
    <td><img src="{{ public_path('template/dist/img/rdtl.png') }}" alt="MapLogo" height="80" width="80"></td>
    <td style="text-align: center">
    <h2 class="a">Republica Democratica de Timor-Leste</h2>
    <h2 class="a">Ministerio da Agricultura e Pescas</h2>
    <h3 class="b">Departamento da Representacao Territorial da Pescas e Aquicultura Municipio Ermera</h3>
    </td>
    <td><img src="{{ public_path('template/dist/img/map.jfif') }}" alt="MapLogo" height="80" width="80"></td>
  </tr>
</table>
<hr>
<br>
  <table id="customers">
    <tr>
      <th>No</th>
      <th scope="col">kode kolam</th>
      <th scope="col">Tekniku</th>
      <th scope="col">Funsionamentu Kolam</th>
      <th scope="col">Comprimento (m)</th>
      <th scope="col">Largura (m)</th>
      <th scope="col">Area (m kuadradu)</th>
      <th scope="col">Altura</th>
      <th scope="col">Volume (m kubiku)</th>
      <th scope="col">Status</th>
      <th scope="col">Observasaun</th>
    </tr>
    @php
        $no=1;
    @endphp
    @foreach ($data as $row)
      <tr>
      <td>{{ $no++}}</td>
      <td>{{ $row->series['series']}}-{{ str_pad($row->numeru, 2, '0',STR_PAD_LEFT) }}</td>
      <td>{{ $row->employee['naran'] }}</td>
      <td>{{ $row->tipu_kolam_id}}</td>
      <td>{{ $row->comprimento_kolam }}</td>
      <td>{{ $row->largura_kolam }}</td>
      <td>{{ $row->area_kolam }}</td>
      <td>{{ $row->altura_kolam }}</td>
      <td>{{ $row->volume_kolam }}</td>
      <td>{{ $row->status }}</td>
      <td>{{ $row->observasaun }}</td>
    </tr>  
    @endforeach
  </table>
  <p></p> <p><strong>Data,___/Fulan___/Tinan_____</strong></p>
  <br>
  <p></p> <p><strong>(______________________________)</strong></p>
</body>
</html>
