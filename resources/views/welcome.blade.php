@extends('layout.admin')
@push('css')
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<body>
  
<div class="wrapper">
    <div class="container">
    <div class="row justify-content-center ">
    <div class="vertical-center1 m-4">
      <div class="card">
        <div class="card-header">
          <div class="vertical-center"><strong>Lokalizasaun Pescas e Aquicultura Ermera</strong></div> 
        </div>
        <div class="card-body">
          <div id='map'></div>
        </div>
      </div>  
    </div>
  </div>
  </div>
</div>
</body>
  <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
  <script>
      let map, markers = [];
       /* ----------------------------- Initialize Map ----------------------------- */
      function initMap() {
          map = L.map('map', {
              center: {
                lat: -8.7177,
                lng: 125.4359,
              },
              zoom: 15
          });

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '© OpenStreetMap'
          }).addTo(map);

          map.on('click', mapClicked);
          initMarkers();
      }
      initMap();

      /* --------------------------- Initialize Markers --------------------------- */
      function initMarkers() {
          const initialMarkers =   <?php echo json_encode($initialMarkers); ?>

          for (let index = 0; index < initialMarkers.length; index++) {

              const data = initialMarkers[index];
              const marker = generateMarker(data, index);
              marker.addTo(map).bindPopup('<b>${data.position.lat},  ${data.position.lng}</b>');
              map.panTo(data.position)
              markers.push(marker)
          }
      }

      function generateMarker(data, index) {
          return L.marker(data.position, {
                  draggable: data.draggable
              })
              .on('click', (event) => markerClicked(event, index))
              .on('dragend', (event) => markerDragEnd(event, index))
      }

      /* ------------------------- Handle Map Click Event ------------------------- */
      function mapClicked($event) {
          console.log(map);
          console.log($event.latlng.lat, $event.latlng.lng);
      }

      /* ------------------------ Handle Marker Click Event ----------------------- */
      function markerClicked($event, index) {
          console.log(map);
          console.log($event.latlng.lat, $event.latlng.lng);
      }

      /* ----------------------- Handle Marker DragEnd Event ---------------------- */
      function markerDragEnd($event, index) {
          console.log(map);
          console.log($event.target.getLatLng());
      }
     
  </script>
    
 <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
         {{-- amcharts --}}
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
       {{-- <script src='https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.js'></script> --}}

     {{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
       google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);      

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
     </script> --}}
@endsection  