<p>{!!$mensaje!!}</p>
<div class="text-center">

    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th scope="col" class="align-middle" style="text-align: center !important;">Codigo</th>
                <th scope="col" class="align-middle" style="text-align: center !important;">N° cargas</th>
                <th scope="col" class="align-middle" style="text-align: center !important;">Tiempo carga</th>
                <th scope="col" class="align-middle" style="text-align: center !important;">Consumo carga</th>
                <th scope="col" class="align-middle" style="text-align: center !important;">N° descargas</th>
                <th scope="col" class="align-middle" style="text-align: center !important;">Tiempo descarga</th>
                <th scope="col" class="align-middle" style="text-align: center !important;">Consumo descarga</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 12; $i++)
            <tr>   
                <td>{{$i+1}}</td>
                <td>4</td>
                <td>3.5 hrs</td>
                <td>400 [A]</td>
                <td>2</td>
                <td>2.4 hrs</td>
                <td>300 [A]</td>
            </tr>
            @endfor
               
        </tbody>
    </table>
</div>