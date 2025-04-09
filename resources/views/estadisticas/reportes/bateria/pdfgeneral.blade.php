<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Batería</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <img src="file:///home/oliverolivares/Documentos/sixmab/public/img/logo.png"
        alt="zxc" title="xzcz" longdesc="z&lt;xzx" style="width: 250px; height: 98px;">

      <style>
        html {
          min-height: 100%;
          position: relative;
        }

        body {
          margin: 0;
          margin-bottom: 40px;
        }

        footer {
          background-color: black;
          position: absolute;
          bottom: 0;
          width: 100%;
          height: 40px;
          color: white;
        }
      </style>
    </head>
    <body>
      <div id="main">
        <table class="table table-bordered">
          <thead>
            <tr class="table-success text-center">
                <th>Nombre</th>
                <th>Siglas</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Número de Serie</th>
            </tr>
          </thead>
          <tbody>
            @foreach($baterias as $item)
              <tr>
                <td>{{ $item->codigo }}</td>
                <td>{{ $item->siglas }}</td>
                <td>{{ $item->marca }}</td>
                <td>{{ $item->modelo }}</td>
                <td>{{ $item->numero_serie }}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
          <p class="western" style="margin-left: 0.27cm; margin-right: 0.51cm; line-height: 115%; text-align: center;"
            lang="es-ES"> <font style="font-size: 10pt" size="2">Se extiende el presente certificado a petición del interesado, para los fines que estime conveniente</font>
          </p>
        <footer class="page-footer font-small blue">
          <div class="footer-copyright text-center py-3">© 2020 Copyright: SIXMAB      
          </div>
        </footer>
      </div>
    </body>
</html>