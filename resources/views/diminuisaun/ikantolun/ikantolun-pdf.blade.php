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
      <th scope="col">Id</th>
      <th scope="col">Data</th>
      <th scope="col">Id Ikan Tolun</th>
      <th scope="col">Total Ikan Tolun</th>
      <th scope="col">Id Ikan Srt</th>
      <th scope="col">Total Ikan Srt</th>
      <th scope="col">Total Diminuisaun</th>
    </tr>
    @php
        $no=1;
    @endphp
    @foreach ($data as $row)
      <tr>
      <td>{{ $no++}}</td>
      <td>{{ $row->id_ikantolund }}</td>
      <td>{{ $row->data->format('j-n-Y') }}</td>
      <td>{{ $row->ikantolun_id }}</td>
      <td>{{ $row->total_ikantolun}}</td>
      <td>{{ $row->srt_id }}</td>
      <td>{{ $row->total_srt }}</td>
      <td>{{ $row->total_diminuisaun }}</td>
    </tr>  
    @endforeach
  </table>
</body>
</html>
