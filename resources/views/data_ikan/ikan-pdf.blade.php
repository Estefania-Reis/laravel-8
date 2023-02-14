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
  font-size: 8pt;
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
      <th scope="col">Id Ikan Brood</th>
      <th scope="col">Data Husik</th>
      <th scope="col">Total Ikan Aman</th>
      <th scope="col">Total Ikan Inan</th>
      <th scope="col">Id Kolam</th>
      <th scope="col">Id Hapa</th>
      <th scope="col">Tipu Ikan</th>
      <th scope="col">Orijem</th>
      <th scope="col">Jerasaun</th>
      <th scope="col">Kodigu Familia</th>
      <th scope="col">Data Diminuisaun</th>
      <th scope="col">Tipu Diminuisaun</th>
      <th scope="col">Razaun Diminuidu</th>
      <th scope="col">Ikan Aman Diminuidu</th>
      <th scope="col">Ikan Inan Diminuidu</th>
      <th scope="col">Ikan Diminuidu</th>
      <th scope="col">Ikan Aman Rezerva</th>
      <th scope="col">Ikan Inan Rezerva</th>
      <th scope="col">Total Ikan Rezerva</th>
      <th scope="col">Ikan Aman Rezerva Atual</th>
      <th scope="col">Ikan Inan Rezerva Atual</th>
      <th scope="col">Total Ikan Rezerva Atual</th>
      <th scope="col">Total Ikan Aman Atual</th>
      <th scope="col">Total Ikan Inan Atual</th>
      <th scope="col">Total Ikan Atual</th>
    </tr>
    @php
        $no=1;
    @endphp
    @foreach ($data as $row)
      <tr>
      <td>{{ $no++}}</td>
      <td>{{ $row->id_ikanbrood }}</td>
      <td>{{ $row->data->format('j-n-Y') }}</td>
      <td>{{ $row->total_m }}</td>
      <td>{{ $row->total_f }}</td>
      <td>{{ $row->kolam_id }}</td>
      <td>{{ $row->hapa_id }}</td>
      <td>{{ $row->tipu_id }}</td>
      <td>{{ $row->orijem_id }}</td>
      <td>{{ $row->jerasaun }}</td>
      <td>{{ $row->codigo_familia}}</td>
      <td>{{ $row->data_dim }}</td>
      <td>{{ $row->tipu_dim }}</td>
      <td>{{ $row->razaun }}</td>
      <td>{{ $row->qty_dim_m }}</td>
      <td>{{ $row->qty_dim_f }}</td>
      <td>{{ $row->total_dim }}</td>
      <td>{{ $row->qty_rez_m }}</td>
      <td>{{ $row->qty_rez_f }}</td>
      <td>{{ $row->total_rez }}</td>
      <td>{{ $row->total_rez_m }}</td>
      <td>{{ $row->total_rez_f }}</td>
      <td>{{ $row->sub_total_rez }}</td>
      <td>{{ $row->qty_atual_m }}</td>
      <td>{{ $row->qty_atual_f }}</td>
      <td>{{ $row->total_atual }}</td>
    </tr>  
    @endforeach
  </table>
  <p></p> <p><strong>Data,___/Fulan___/Tinan_____</strong></p>
  <br>
  <p></p> <p><strong>(______________________________)</strong></p>
</body>
</html>
