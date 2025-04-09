@extends("theme.$theme.layout")
@section('titulo')
Reportes
@endsection

@section('contenido')
<div class="box-tools pull-right" style="margin-right: 4px;">
    <a href="{{route('generar-pdf')}}" class="btn btn-block btn-success btn-sm">
        <i class="fa fa-fw fa-plus-circle"></i> Generar PDF
    </a>
</div>
<h2>Reportes</h2>

<h3>{{$empresa->nombre}}</h3>
@include('reportes.tabla_tecnico')

@include('reportes.tabla_general')

@include('reportes.tabla_consumo')

<div id="canvas-container">
    <canvas id="myChart"></canvas>
</div>

<canvas id="chart" width="400" height="400"></canvas>

<script type="text/javascript" src="{{asset("js/jquery-1.12.0.min.js")}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

<script>


    var ctx = document.getElementById("chart").getContext("2d");
    var data = {
        labels: ["ET", "ET"],
        datasets: [{
            label: "Product A",
            fillColor: "rgba(220,220,220,0)",
            strokeColor: "black",

            data: [10]
        }, {
            label: "Product B",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",

        }]

    }

    var myBarChart = new Chart(ctx).Line(data);
    setInterval(function(){

		/*$.get('http://localhost:8000/reportes/crear', (data) => {
			console.log(data);
			
			//myChart.resize();
		});*/
      		myBarChart.addData([numeroAleatorio(5,15)], "ET");
		
    },2000);

    function numeroAleatorio(min, max) {
        return Math.floor(Math.random() * (max - min + 1) ) + min;
    }

	</script>
@endsection