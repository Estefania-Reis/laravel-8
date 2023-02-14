@extends('layout.admin')

@section('content')
<body>
  
  <div class="content-wrapper">
    <div class="container ml-3 ">
      <!-- Content Header (Page header) -->
      <div class="vertical-center mt-2">
        <div class="h3">Dadus Estatistiku Pescas e Aquicultura</div>
      </div>
      
     <div class="row justify-content-center mt-3">
      
       <div class="card mr-3">
         <div class="card-header" style="color: rgb(2, 38, 24)"> 
          <div class="vertical-center">Grafiku Anual - Produsaun Ikan Brood</div> 
        </div>
           <div class="card-body" style="width: 500px; height: 340px;">
             <div id="columnchart_material" style="width: 460px; height: 300px;"></div>
         </div>
         <div class="card-footer">
          <div class="vertical-center">
            <a href="/export-estatistiku-produsaun-ib">tabela</a>
          </div>
         </div>
       </div>

       <div class="card mr-3">
        <div class="card-header" style="color: rgb(2, 38, 24)"> 
          <div class="vertical-center">Grafiku Anual - Produsaun Ikan Nursery</div>
        </div>
          <div class="card-body" style="width: 500px; height: 340px;">
            <div id="columnchart_material_in" style="width: 460px; height: 300px;"></div>
        </div>
        <div class="card-footer">
          <div class="vertical-center">
            <a href="/export-estatistiku-produsaun-inur">tabela</a>
          </div>
         </div>
      </div>

      <div class="card mr-3">
        <div class="card-header" style="color: rgb(2, 38, 24)"> 
          <div class="vertical-center">Grafiku Anual - Distribuisaun Ikan Nursery</div>
        </div>
          <div class="card-body" style="width: 500px; height: 340px;">
            <div id="columnchart_material_dis" style="width: 460px; height: 300px;"></div>
        </div>
        <div class="card-footer">
          <div class="vertical-center">
            <a href="/export-estatistiku-distribuisaun">tabela</a>
          </div>
         </div>
      </div>

      <div class="card mr-3">
        <div class="card-header" style="color: rgb(2, 38, 24)"> 
          <div class="vertical-center">Grafiku Anual - Lelaun Ikan Brood</div>
        </div>
          <div class="card-body" style="width: 500px; height: 340px;">
            <div id="columnchart_material_lel" style="width: 460px; height: 300px;"></div>
        </div>
        <div class="card-footer">
          <div class="vertical-center">
            <a href="/export-lelaun">tabela</a>
          </div>
         </div>
      </div>

      </div>
    </div>
  </div>
</body>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
crossorigin="anonymous"></script>
{{-- amcharts --}}
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);
// draw chart ikan broods
function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Tinan', 'Ikan-Aman-Atual', 'Ikan-Inan-Atual', 'Total-Ikan-Atual', 'Ikan-Aman-Diminuidu', 'Ikan-Inan-Diminuidu','Total-Ikan-Diminuidu'],
  @foreach ($charts as $chart)
  ["{{ date('Y', strtotime($chart->data)) }}", {{ $chart->qty_atual_m }}, {{ $chart->qty_atual_f }}, {{ $chart->total_atual }}, {{ $chart->qty_dim_m }}, {{ $chart->qty_dim_f }}, {{ $chart->total_dim }}],
  @endforeach
]);
var options = {
  chart: {
    subtitle: '',
  }
};
var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);
  // draw chart lelaun ikan 
  function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Tinan', 'Total Ikan'],
    @foreach ($chartlel as $chart)
    ["{{ date('Y', strtotime($chart->created_at)) }}", {{ $chart->total_ikan }}],
    @endforeach
  ]);
  var options = {
    chart: {
      subtitle: '',
    }
  };
  var chart = new google.charts.Bar(document.getElementById('columnchart_material_lel'));
  chart.draw(data, google.charts.Bar.convertOptions(options));
  }
  </script>

<script type="text/javascript">
  // draw chart ikan nursery distribuisaun
  google.charts.load('current', {'packages':['bar']});
   google.charts.setOnLoadCallback(drawChart);
 
   function drawChart() {
   var data = google.visualization.arrayToDataTable([
     ['Tinan', 'M.Sex', 'N.M.Sex', 'Total'],
     
     ["{{ date('Y', strtotime($data1->data)) }}","{{ $data1->total_ikan_oan_msex_atual }}", "{{ $data1->total_ikan_oan_nmsex_atual }}", "{{ $data1->total_ikan_oan_atual }}"],
     
   ]);
   var options = {
     chart: {
       subtitle: '',
     }
   };
   var chart = new google.charts.Bar(document.getElementById('columnchart_material_in'));
   chart.draw(data, google.charts.Bar.convertOptions(options));
   }
 </script>
<script type="text/javascript">
 // draw chart ikan nursery distribuisaun
 google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Tinan', 'M.Sex', 'N.M.Sex', 'Total'],
    ["{{ $tinan_dis }}","{{ $total_ikan_msex_dis }}", "{{ $total_ikan_nmsex_dis }}", "{{ $total_ikan_nur_dis }}"],
    
  ]);
  var options = {
    chart: {
      subtitle: '',
    }
  };
  var chart = new google.charts.Bar(document.getElementById('columnchart_material_dis'));
  chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

  @endsection

    
 

    