<!DOCTYPE html>
<html>
<head>
<style>
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
</style>
</head>
<body>
<h1> Dadus Funcionarios Pescas e Aquicultura </h1>
<table id="customers">
  <tr>
    <th>No</th>
    <th>Naran</th>
    <th>Jeneru</th>
    <th>No telfone</th>
    <th>Foto</th>
    <th>Data Moris</th>
    <th>Pozisaun</th>
    <th>Pozisaun</th>
    <th>Status</th>
    <th>Nivel Edukasaun</th>
    <th>Level</th>
    <th>Obs</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $row)
    <tr>
    <td>{{ $no++}}</td>
    <td>{{ $row->naran }}</td>
    <td>{{ $row->jeneru }}</td>
    <td>{{ $row->nmr_telefone }}</td>
    <td>
      <img src="{{ asset('storage/fotopegawai/'.$row->foto) }}" alt="" style="width: 40px;" class="brand-image img-circle elevation-3">
    </td>
    <td>{{ $row->data_moris }}</td>
    <td>{{ $row->pozisaun }}</td>
    <td>{{ $row->status }}</td>
    <td>{{ $row->nivel_ed_id }}</td>
    <td>{{ $row->level }}</td>
    <td>{{ $row->obs }}</td>
  </tr>  
  @endforeach
  
  
</table>

</body>
</html>
