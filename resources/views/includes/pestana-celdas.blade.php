<div class="row">
    <div class="w-100">
        <div class="info-box">
            <div class="info-box-content">
                <div class="table-responsive">
                    <table style="margin: auto;">
                        <thead>
                            <tr>
                                <th>
                                    @for ($i = 1; $i <= $bateria->cantidad_celda; $i++)   
                                        <th><a href="{{route('monitoreo.celda', ['bateria' => $bateria, 'celda' => $i])}}">
                                            <button type="button" class="btn btn-success btn-sm">{{$i}}</button></a>
                                        </th>
                                    @endfor
                                </th> 
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>          
</div>