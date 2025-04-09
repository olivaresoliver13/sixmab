<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<img src="{{ public_path('img/logo.png')}}" alt="Error al cargar la imagen" style="width: 250px;">
		<div style="float:right; position: relative;">
			@php
				$dt = new DateTime();
				echo 'Fecha:'. $dt->format('d-m-Y');
			@endphp	
		</div>
		<h3><b>Reporte 
			@if ($reporte == 'general') 
				general
			@elseif($reporte == 'variables') 
				específico de variables
			@endif
		</h3>
		<br>
		<h4><b>Empresa: {{$empresa->nombre}}</b></h4>
		<br>
		@include('reportes.tabla_'.$reporte)

		<img src="{{ public_path('img/Biobusiness.png')}}" alt="Error al cargar la imagen" style="position: relative; float: right; position: fixed; bottom: 70px;right: 43px;width: 15%;opacity: 0.6;">
	</body>
</html>