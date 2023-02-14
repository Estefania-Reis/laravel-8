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
    </tr>
    @php
        $no=1;
    @endphp
    @foreach ($data as $row)
      <tr>
      <td>{{ $no++}}</td>
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
          <img src="{{ public_path('storage/proposta/'.$row->proposta) }}" alt="proposta" style="width: 40px;" class="brand-image img-square elevation-3">
      </td>
    </tr>  
    @endforeach
  </table>
</body>
</html>
