<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <img src="file:///home/oliverolivares/Documentos/sixmab/public/img/logo.png" alt="zxc" title="xzcz"
        longdesc="z&lt;xzx" style="width: 250px; height: 98px;">


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
        background-color: green;
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
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
        <tr><td>
            <table width="100%" align="left" cellpadding="0" cellspacing="0" style="margin: 20px;">
            <tr><td>
                <table width="500" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td align="center" style="font-size: 28px; font-weight: 300; line-height: 2.5em; color: black; font-family: sans-serif;">
                                Informe
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <br><br><br><br>
                                <table class="top" width="100%" align="left" cellpadding="0" cellspacing="0" style="margin-top: 20px; margin: 10px;">
                                    <tbody>
                                        <tr>
                                            <td style="font-size: 15px; color:black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                <strong>INFORMACION<:</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="105%" align="left" cellpadding="0" cellspacing="0">
                                    <tr><td>
                                    <table border="1" class="top" width="93%" align="left" cellpadding="0" cellspacing="0" style="margin-top: 20px; margin: 10px;">
                                        <tbody>
                                            <tr>
                                                <td style="font-size: 12px; color:black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    <strong>Fecha:</strong>
                                                </td>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    {{$fecha}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    <strong>Nombre:</strong>
                                                </td>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    {{$bateria->codigo}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <table border="1" class="top" width="93%" align="left" cellpadding="0" cellspacing="0" style="margin-top: 20px; margin: 10px;">
                                        <tbody>
                                            <tr>
                                                <td style="font-size: 12px; color:black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    <strong>Siglas:</strong>
                                                </td>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    {{$bateria->siglas}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    <strong>Marca:</strong>
                                                </td>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    {{$bateria->marca}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    <strong>Modelo:</strong>
                                                </td>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    {{$bateria->modelo}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    <strong>Número de Serie:</strong>
                                                </td>
                                                <td style="font-size: 12px; color:#black; text-align:left; font-family: sans-serif; padding: 5px;">
                                                    {{$bateria->numero_serie}}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                     <!-- Copyright -->
                                    </td></tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <footer class="page-footer font-small blue">
                    <div class="footer-copyright text-center py-3">© 2020 Copyright: SIXMAB
                
                    </div>
                </footer>
            </td></tr>
            </table>
        </td></tr>
        </tbody>
    </table>
</body>

</html>