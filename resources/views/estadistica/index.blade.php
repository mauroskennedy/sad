@extends ('layouts.plantillaBaseDespacho')

@section('contenido')

<h1 class="text-center">Estadisticas Distritos Municipales</h1>
<h2 class="text-center">Ciudad de El Alto</h1>
<div class="d-flex justify-content-center mt-5 " style="width:100%;">
    <div id="columnchart_values" style="width: 1200px; height: 400px;"></div>
</div>
<div class="d-flex justify-content-center mt-5 " style="width:100%;">
    <div id="piechart" style="width: 1200px; height: 400px;"></div>
</div>
  
  
<div style="display: none;">

    <input id="d1" type="text" value="{{$urbanizacionesList[1]}}">
    <input id="d2" type="text" value="{{$urbanizacionesList[2]}}">
    <input id="d3" type="text" value="{{$urbanizacionesList[3]}}">
    <input id="d4" type="text" value="{{$urbanizacionesList[4]}}">
    <input id="d5" type="text" value="{{$urbanizacionesList[5]}}">
    <input id="d6" type="text" value="{{$urbanizacionesList[6]}}">
    <input id="d7" type="text" value="{{$urbanizacionesList[7]}}">
    <input id="d8" type="text" value="{{$urbanizacionesList[8]}}">
    <input id="d9" type="text" value="{{$urbanizacionesList[9]}}">
    <input id="d10" type="text" value="{{$urbanizacionesList[10]}}">
    <input id="d11" type="text" value="{{$urbanizacionesList[11]}}">
    <input id="d12" type="text" value="{{$urbanizacionesList[12]}}">
    <input id="d13" type="text" value="{{$urbanizacionesList[13]}}">
    <input id="d14" type="text" value="{{$urbanizacionesList[14]}}">
   
</div>

@endsection

@section('jss')


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    
    let d1 = $('#d1').val()
    let md1 = parseInt(d1, 10);
    let d2 = $('#d2').val()
    let md2 = parseInt(d2, 10);
    let d3 = $('#d3').val()
    let md3 = parseInt(d3, 10);
    let d4 = $('#d4').val()
    let md4 = parseInt(d4, 10);
    let d5 = $('#d5').val()
    let md5 = parseInt(d5, 10);
    let d6 = $('#d6').val()
    let md6 = parseInt(d6, 10);
    let d7 = $('#d7').val()
    let md7 = parseInt(d7, 10);
    let d8 = $('#d8').val()
    let md8 = parseInt(d8, 10);
    let d9 = $('#d9').val()
    let md9 = parseInt(d9, 10);
    let d10 = $('#d10').val()
    let md10 = parseInt(d10, 10);
    let d11 = $('#d11').val()
    let md11 = parseInt(d11, 10);
    let d12 = $('#d12').val()
    let md12 = parseInt(d12, 10);
    let d13 = $('#d13').val()
    let md13 = parseInt(d13, 10);
    let d14 = $('#d14').val()
    let md14 = parseInt(d14, 10);

               
      //console.log(numero);

    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Distrito", "Cantidad", { role: "style" } ],
        ["DM-1", md1, "opacity: 0.5"],
        ["DM-2", md2, "opacity: 0.5"],
        ["DM-3", md3, "opacity: 0.5"],
        ["DM-4", md4, "opacity: 0.5"],
        ["DM-5", md5, "opacity: 0.5"],
        ["DM-6", md6, "opacity: 0.5"],
        ["DM-7", md7, "opacity: 0.5"],
        ["DM-8", md8, "opacity: 0.5"],
        ["DM-9", md9, "opacity: 0.5"],
        ["DM-10", md10, "opacity: 0.5"],
        ["DM-11", md11, "opacity: 0.5"],
        ["DM-12", md12, "opacity: 0.5"],
        ["DM-13", md13, "opacity: 0.5"],
        ["DM-14", md14, "opacity: 0.5"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Cantidad Urbanizaciones por Distrito",
        width: 1200,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);



      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
          ["Distrito", "Cantidad"],
          ["DM-1", md1],
          ['DM-2', md2],
          ['DM-3', md3],
          ['DM-4', md4],
          ['DM-5', md5],
          ['DM-6', md6],
          ['DM-7', md7],
          ['DM-8', md8],
          ['DM-9', md9],
          ['DM-10', md10],
          ['DM-11', md11],
          ['DM-12', md12],
          ['DM-13', md13],
          ['DM-14', md14]
        ]);

        var options = {
          title: 'Cantidad Urbanizaciones por Distrito',
          width: 1200,
          height: 400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

  }
  </script>


   

   


@endsection