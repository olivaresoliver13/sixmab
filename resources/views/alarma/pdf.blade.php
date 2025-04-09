<!DOCTYPE html>
<html>
	<head>
		<style>
			body {
				font-family: sans-serif;
			}
			@page {
				margin: 160px 50px;
			}
			header { 
				position: fixed;
				left: 0px;
				top: -110px;
				right: 0px;
				height: 100px;
				text-align: left;
			}
			footer {
				position: fixed;
				left: 0px;
				bottom: -50px;
				right: 0px;
				height: 40px;
				border-bottom: 2px solid #ddd;
			}
			footer .page:after {
				content: counter(page);
			}
			footer table {
				width: 100%;
			}
			footer p {
				text-align: right;
			}
			footer .izq {
				text-align: left;
			}
		</style>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</head>
<body>
	<header>
		<img src="{{ public_path('img/logo.png')}}" alt="Error al cargar la imagen" style="width: 250px;">
		<div style="float:right; position: relative;">
			@php
				$dt = new DateTime();
				echo 'Fecha:'. $dt->format('d-m-Y');
			@endphp	
		</div>
	</header>
<footer>
	<table>
		<tr>
			<td>
				<p class="izq">
					<img src="{{ public_path('img/Biobusiness.png')}}" alt="Error al cargar la imagen" style="width: 150px;">
				</p>
			</td>
			<td>
				<p class="page">
					Página
				</p>
			</td>
		</tr>
	</table>
</footer>
<div id="content">
	@include('alarma.detalle_cuerpo_pdf')
</div>
</body>
</html>