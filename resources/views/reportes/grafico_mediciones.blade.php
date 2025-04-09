<link rel="stylesheet" href="{{asset("css/sytles-grafico.css")}}">

<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2" style="background: black;">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#corriente" data-toggle="tab">Corriente [ A ]</a></li>
                <li class="nav-item"><a class="nav-link" href="#voltaje" data-toggle="tab">Voltaje [ V ]</a></li>
                <li class="nav-item"><a class="nav-link" href="#temperatura" data-toggle="tab">Temperatura [ °C ]</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="corriente">
                    <div id="corriente"> 
                        <div class="row">
                            <head>
                                <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
                                <script>
                                    function transformar_fecha(date){
                                        let comp = date.split(' ');                                                
                                        let fecha = comp[0].split('-');
                                        let hora = comp[1].split(':');
                        
                                        return Date.UTC(fecha[0], fecha[1] - 1, fecha[2], hora[0], hora[1], hora[2]);
                                    }
                        
                                    $(document).ready(function()
                                    {   
                                        let baterias_mediciones = [];
                                        $.get('{{route('reportes.obtener_mediciones', ['empresa' => $empresa])}}', (mediciones) => {

                                            baterias_mediciones = mediciones.map( (fila) => {
                                                let bateria = fila.bateria.numero_bateria;
                                                let bateriatemp = fila.bateria.cantidad_temperatura;
                                                let bateriacelda = fila.bateria.cantidad_celda;
                        
                                                let voltajes = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltajeTotal ? parseFloat(medicion.voltajeTotal) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje0 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje0 ? parseFloat(medicion.voltaje0) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje1 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje1 ? parseFloat(medicion.voltaje1) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje2 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje2 ? parseFloat(medicion.voltaje2) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje3 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje3 ? parseFloat(medicion.voltaje3) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje4 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje4 ? parseFloat(medicion.voltaje4) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje5 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje5 ? parseFloat(medicion.voltaje5) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje6 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje6 ? parseFloat(medicion.voltaje6) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje7 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje7 ? parseFloat(medicion.voltaje7) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje8 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje8 ? parseFloat(medicion.voltaje8) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje9 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje9 ? parseFloat(medicion.voltaje9) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje10 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje10 ? parseFloat(medicion.voltaje10) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje11 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje11 ? parseFloat(medicion.voltaje11) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje12 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje12 ? parseFloat(medicion.voltaje12) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje13 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje13 ? parseFloat(medicion.voltaje13) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje14 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje14 ? parseFloat(medicion.voltaje14) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje15 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje15 ? parseFloat(medicion.voltaje15) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje16 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje16 ? parseFloat(medicion.voltaje16) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje17 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje17 ? parseFloat(medicion.voltaje17) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje18 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje18 ? parseFloat(medicion.voltaje18) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje19 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje19 ? parseFloat(medicion.voltaje19) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje20 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje20 ? parseFloat(medicion.voltaje20) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje21 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje21 ? parseFloat(medicion.voltaje21) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje22 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje22 ? parseFloat(medicion.voltaje22) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });

                                                let voltaje23 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = medicion.voltaje23 ? parseFloat(medicion.voltaje23) : 0;
                                                        
                                                    return {x: hora, y: voltaje};
                                                });
                        
                                                let corrientes = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let corriente = medicion.corriente ? parseFloat(medicion.corriente) : 0;
                        
                                                    return {x: hora, y: corriente};
                                                });
                        
                                                let temperaturas = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let sum_temperaturas = 0;
                                                    
                                                    if (bateriatemp == 1) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0);
                                                    } else if (bateriatemp == 2) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1);
                                                    } else if (bateriatemp == 3) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1) + parseFloat(medicion.temperatura2);
                                                    } else if (bateriatemp == 4) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1) + parseFloat(medicion.temperatura2) + parseFloat(medicion.temperatura3);
                                                    } else if (bateriatemp == 5) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1) + parseFloat(medicion.temperatura2) + parseFloat(medicion.temperatura3) + parseFloat(medicion.temperatura4);
                                                    } else if (bateriatemp == 6) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1) + parseFloat(medicion.temperatura2) + parseFloat(medicion.temperatura3) + parseFloat(medicion.temperatura4) + parseFloat(medicion.temperatura5);
                                                    } else if (bateriatemp == 7) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1) + parseFloat(medicion.temperatura2) + parseFloat(medicion.temperatura3) + parseFloat(medicion.temperatura4) + parseFloat(medicion.temperatura5) + parseFloat(medicion.temperatura6);
                                                    } else if (bateriatemp == 8) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1) + parseFloat(medicion.temperatura2) + parseFloat(medicion.temperatura3) + parseFloat(medicion.temperatura4) + parseFloat(medicion.temperatura5) + parseFloat(medicion.temperatura6) + parseFloat(medicion.temperatura7);
                                                    } else if (bateriatemp == 9) {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1) + parseFloat(medicion.temperatura2) + parseFloat(medicion.temperatura3) + parseFloat(medicion.temperatura4) + parseFloat(medicion.temperatura5) + parseFloat(medicion.temperatura6) + parseFloat(medicion.temperatura7) + parseFloat(medicion.temperatura8);
                                                    } else {
                                                        sum_temperaturas = parseFloat(medicion.temperatura0) + parseFloat(medicion.temperatura1) + parseFloat(medicion.temperatura2) + parseFloat(medicion.temperatura3) + parseFloat(medicion.temperatura4) + parseFloat(medicion.temperatura5) + parseFloat(medicion.temperatura6) + parseFloat(medicion.temperatura7) + parseFloat(medicion.temperatura8) + parseFloat(medicion.temperatura9);
                                                    }

                                                    let temperatura = sum_temperaturas/bateriatemp;
                        
                                                    return {x: hora, y: temperatura};
                                                });

                                                let temperatura1 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                        
                                                    let temperatura = parseFloat(medicion.temperatura0);
                        
                                                    return {x: hora, y: temperatura};
                                                });

                                                let temperatura2 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                        
                                                    let temperatura = parseFloat(medicion.temperatura1)
                        
                                                    return {x: hora, y: temperatura};
                                                });

                                                let temperatura3 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                        
                                                    let temperatura = parseFloat(medicion.temperatura2)
                        
                                                    return {x: hora, y: temperatura};
                                                });

                                                let temperatura4 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                        
                                                    let temperatura = parseFloat(medicion.temperatura3)
                        
                                                    return {x: hora, y: temperatura};
                                                });

                                                let temperatura5 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                        
                                                    let temperatura = parseFloat(medicion.temperatura4)
                        
                                                    return {x: hora, y: temperatura};
                                                });

                                                let temperatura6 = fila.mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                        
                                                    let temperatura = parseFloat(medicion.temperatura5)
                        
                                                    return {x: hora, y: temperatura};
                                                });
                        
                                                return { 
                                                    bateria: bateria, 
                                                    voltajes: voltajes, 
                                                    voltaje0: voltaje0, 
                                                    voltaje1: voltaje1, 
                                                    voltaje2: voltaje2, 
                                                    voltaje3: voltaje3, 
                                                    voltaje4: voltaje4,  
                                                    voltaje5: voltaje5,  
                                                    voltaje6: voltaje6,  
                                                    voltaje7: voltaje7, 
                                                    voltaje8: voltaje8,   
                                                    voltaje9: voltaje9,  
                                                    voltaje10: voltaje10,  
                                                    voltaje11: voltaje11,  
                                                    voltaje12: voltaje12,  
                                                    voltaje13: voltaje13,  
                                                    voltaje14: voltaje14,  
                                                    voltaje15: voltaje15,  
                                                    voltaje16: voltaje16,  
                                                    voltaje17: voltaje17,  
                                                    voltaje18: voltaje18,  
                                                    voltaje19: voltaje19,  
                                                    voltaje20: voltaje20,
                                                    voltaje21: voltaje21,   
                                                    voltaje22: voltaje22,  
                                                    voltaje23: voltaje23, 
                                                    corrientes: corrientes, 
                                                    temperaturas: temperaturas, 
                                                    temperatura1: temperatura1, 
                                                    temperatura2: temperatura2, 
                                                    temperatura3: temperatura3, 
                                                    temperatura4: temperatura4, 
                                                    temperatura5: temperatura5, 
                                                    temperatura6: temperatura6,
                                                    bateriatemp: bateriatemp, 
                                                    bateriacelda: bateriacelda,
                                                }
                                            });

                                            baterias_mediciones.forEach(fila => {

                                                let bateriacelda1 = fila.bateriacelda;
                                                let bateriatemp1 = fila.bateriatemp;

                                                chart_voltaje.addSeries({
                                                    name: fila.bateria,
                                                    data: fila.voltajes,
                                                    pointInterval: 15000
                                                });
                                                
                                                if (bateriacelda1 >= 1){
                                                    chart_voltaje0.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje0,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 2){
                                                    chart_voltaje1.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje1,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 3){
                                                    chart_voltaje2.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje2,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 4){
                                                    chart_voltaje3.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje3,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 5){
                                                    chart_voltaje4.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje4,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 6){
                                                    chart_voltaje5.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje5,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 7){
                                                    chart_voltaje6.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje6,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 8){
                                                    chart_voltaje7.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje7,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 9){
                                                    chart_voltaje8.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje8,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 10){
                                                    chart_voltaje9.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje9,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 11){
                                                    chart_voltaje10.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje10,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 12){
                                                    chart_voltaje11.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje11,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 13){
                                                    chart_voltaje12.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje12,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 14){
                                                    chart_voltaje13.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje13,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 15){
                                                    chart_voltaje14.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje14,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 16){
                                                    chart_voltaje15.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje15,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 17){
                                                    chart_voltaje16.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje16,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 18){
                                                    chart_voltaje17.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje17,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 19){
                                                    chart_voltaje18.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje18,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 20){
                                                    chart_voltaje19.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje19,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 21){
                                                    chart_voltaje20.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje20,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 22){
                                                    chart_voltaje21.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje21,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 23){
                                                    chart_voltaje22.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje22,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriacelda1 >= 24){
                                                    chart_voltaje23.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.voltaje23,
                                                        pointInterval: 15000
                                                    });
                                                }

                                                chart_corriente.addSeries({
                                                    name: fila.bateria,
                                                    data: fila.corrientes,
                                                    pointInterval: 15000
                                                });

                                                chart_temperatura.addSeries({
                                                    name: fila.bateria,
                                                    data: fila.temperaturas,
                                                    pointInterval: 15000
                                                });

                                                if (bateriatemp1 >= 1){
                                                    chart_temperatura1.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.temperatura1,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriatemp1 >= 2){
                                                    chart_temperatura2.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.temperatura2,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriatemp1 >= 3){
                                                    chart_temperatura3.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.temperatura3,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriatemp1 >= 4){
                                                    chart_temperatura4.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.temperatura4,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriatemp1 >= 5){
                                                    chart_temperatura5.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.temperatura5,
                                                        pointInterval: 15000
                                                    });
                                                }
                                                if (bateriatemp1 >= 6){
                                                    chart_temperatura6.addSeries({
                                                        name: fila.bateria,
                                                        data: fila.temperatura6,
                                                        pointInterval: 15000
                                                    });
                                                }
                                            }); 
                                        });
                                    });
                                </script>

                                <script src="{{asset('js/highcharts/highstock.js')}}"></script>
                                <script src="{{asset('js/highcharts/exporting.js')}}"></script>
                                <script src="{{asset('js/highcharts/offline-exporting.js')}}"></script>
                                <script src="{{asset('js/highcharts/export-data.js')}}"></script>
                                <script src="{{asset('js/highcharts/data.js')}}"></script>
                                
                                <div class="container" id="container" style="height: 400px; min-width: 100%"></div>
                                <script>
                                    var chart_corriente = Highcharts.stockChart('container', {
                                        
                                        time: {
                                            useUTC: true
                                        },
                        
                                        rangeSelector: {
                                            buttons: [{
                                                count: 3,
                                                type: 'minute',
                                                text: '3m'
                                            },{
                                                count: 6,
                                                type: 'minute',
                                                text: '6m'
                                            },{
                                                count: 15,
                                                type: 'minute',
                                                text: '15m'
                                            },{
                                                count: 30,
                                                type: 'minute',
                                                text: '30m'
                                            },{
                                                type: 'all',
                                                text: 'Todo'
                                            }],
                                            inputEnabled: false,
                                            selected: 0
                                        },
                        
                                        title: {
                                            text: 'Corriente [ A ]'
                                        },
                        
                                        yAxis: {
                                            title: {
                                                text: 'Corriente [ A ]'
                                            },
                                            plotLines: [{
                                                value: {{$disp_maestro->corriente_min}},
                                                color: 'red',
                                                dashStyle: 'shortdash',
                                                width: 2,
                                                label: {
                                                    text: 'Corriente mínima'
                                                }
                                            }, {
                                                value: {{$disp_maestro->corriente_max}},
                                                color: 'green',
                                                dashStyle: 'shortdash',
                                                width: 2,
                                                label: {
                                                    text: 'Corriente máxima'
                                                }
                                            }]
                                        },
                        
                                        tooltip: {
                                            headerFormat: '<b>{point.y:.2f} [ A ]</b>',
                                            pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Corriente:</b> {point.y:.2f} [ A ]'
                                        },
                        
                                        exporting: {
                                            enabled: true
                                        },
                                        plotOptions: {
                                            series: {
                                            turboThreshold: 0 // Comment out this code to display error
                                            }
                                        },
                        
                                        series: []
                                    });
                                </script>
                            </head>
                        </div>                      
                        <div class="d-flex flex-row justify-content-end">
                            <div class="row">
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-text text-success">Corriente Máximo: </span>
                                        <span class="description-percentage">
                                            {{$disp_maestro->corriente_max}}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-text text-danger">Corriente Mínimo: </span>
                                        <span class="description-percentage">
                                            {{$disp_maestro->corriente_min}}
                                        </span>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="voltaje">
                    <div id="voltaje">
                        <div class="row">
                            <head>
                                <div class="container-fluid" id="container2" style="height: 400px; min-width: 100%"></div>
                                <script>
                                    var chart_voltaje = Highcharts.stockChart('container2', {
                                        chart: {
                                            
                                            events: {
                                                load: function () {
                                                }
                                            }
                                        },
                                        time: {
                                            useUTC: true
                                        },
                        
                                        rangeSelector: {
                                            buttons: [{
                                                count: 3,
                                                type: 'minute',
                                                text: '3m'
                                            },{
                                                count: 6,
                                                type: 'minute',
                                                text: '6m'
                                            },{
                                                count: 15,
                                                type: 'minute',
                                                text: '15m'
                                            },{
                                                count: 30,
                                                type: 'minute',
                                                text: '30m'
                                            },{
                                                type: 'all',
                                                text: 'Todo'
                                            }],
                                            inputEnabled: false,
                                            selected: 0
                                        },
                        
                                        title: {
                                            text: 'Voltaje Total [ V ]'
                                        },
                        
                                        yAxis: {
                                            title: {
                                                text: 'Voltaje Total [ V ]'
                                            },

                                            plotLines: [{
                                                value: {{$disp_maestro->voltaje_min * $bateria2->cantidad_celda}},
                                                color: 'red',
                                                dashStyle: 'shortdash',
                                                width: 2,
                                                label: {
                                                    text: 'Voltaje mínimo'
                                                }
                                            }, {
                                                value: {{$disp_maestro->voltaje_max * $bateria2->cantidad_celda}},
                                                color: 'green',
                                                dashStyle: 'shortdash',
                                                width: 2,
                                                label: {
                                                    text: 'Voltaje máximo'
                                                }
                                            }]
                                        },
                        
                                        tooltip: {
                                            headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                            pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje Total:</b> {point.y:.2f} [ V ]'
                                        },
                        
                                        exporting: {
                                            enabled: true
                                        },
                        
                                        plotOptions: {
                                            series: {
                                            turboThreshold: 0 // Comment out this code to display error
                                            }
                                        },
                        
                                        series: []
                                    });
                                </script>
                            </head>
                        </div>                             
                        <div class="d-flex flex-row justify-content-end">
                            <div class="row">
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                        <span class="description-text text-success">Voltaje Máximo: </span>
                                        <span class="description-percentage">
                                            {{$disp_maestro->voltaje_max * $bateria2->cantidad_celda}}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                        <span class="description-text text-danger">Voltaje Mínimo: </span>
                                        <span class="description-percentage">
                                            {{$disp_maestro->voltaje_min * $bateria2->cantidad_celda}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                    @if ($bateria2->cantidad_celda >= 1)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje0">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container14" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje0 = Highcharts.stockChart('container14', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 1 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 1 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 1:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 2)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje1">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container15" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje1 = Highcharts.stockChart('container15', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 2 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 2 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 2:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 3)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje2">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container16" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje2 = Highcharts.stockChart('container16', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 3 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 3 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 3:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 4)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje3">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container17" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje3 = Highcharts.stockChart('container17', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 4 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 4 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 4:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 5)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje4">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container18" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje4 = Highcharts.stockChart('container18', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 5 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 5 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 5:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 6)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje5">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container19" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje5 = Highcharts.stockChart('container19', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 6 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 6 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 6:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 7)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje6">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container20" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje6 = Highcharts.stockChart('container20', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 7 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 7 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 7:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 8)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje7">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container21" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje7 = Highcharts.stockChart('container21', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 8 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 8 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 8:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 9)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje8">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container22" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje8 = Highcharts.stockChart('container22', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 9 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 9 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 9:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 10)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje9">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container23" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje9 = Highcharts.stockChart('container23', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 10 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 10 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 10:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 11)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje10">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container24" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje10 = Highcharts.stockChart('container24', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 11 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 11 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 11:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 12)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje11">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container25" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje11 = Highcharts.stockChart('container25', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 12 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 12 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 12:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 13)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje12">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container26" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje12 = Highcharts.stockChart('container26', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 13 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 13 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 13:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 14)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje13">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container27" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje13 = Highcharts.stockChart('container27', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 14 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 14 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 14:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 15)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje14">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container28" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje14 = Highcharts.stockChart('container28', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 15 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 15 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 15:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 16)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje15">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container29" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje15 = Highcharts.stockChart('container29', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 16 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 16 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 16:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 17)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje16">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container30" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje16 = Highcharts.stockChart('container30', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 17 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 17 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 17:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 18)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje17">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container31" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje17 = Highcharts.stockChart('container31', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 18 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 18 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 18:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 19)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje18">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container32" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje18 = Highcharts.stockChart('container32', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 19 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 19 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 19:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 20)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje19">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container33" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje19 = Highcharts.stockChart('container33', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 20 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 20 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 20:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 21)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje20">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container34" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje20 = Highcharts.stockChart('container34', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 21 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 21 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 21:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 22)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje21">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container35" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje21 = Highcharts.stockChart('container35', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 22 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 22 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 22:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 23)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje22">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container36" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje22 = Highcharts.stockChart('container36', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 23 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 23 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 23:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                    @if ($bateria2->cantidad_celda >= 24)
                        <br><div style="background: #e4eaf3"><br></div><br>  
                        <div id="voltaje23">
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container37" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_voltaje23 = Highcharts.stockChart('container37', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Voltaje 24 [ V ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje 24 [ V ]'
                                                },

                                                plotLines: [{
                                                    value: {{$disp_maestro->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje 24:</b> {point.y:.2f} [ V ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                             
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    @endif
                </div>
                <div class="tab-pane" id="temperatura">   

                    <div id="temperatura">            
                        <div class="row">
                            <head>
                                <div class="container-fluid" id="container3" style="height: 400px; min-width: 100%"></div>
                                <script>
                                    var chart_temperatura = Highcharts.stockChart('container3', {
                                        chart: {
                                            
                                            events: {
                                                load: function () {
                                                }
                                            }
                                        },
                                        time: {
                                            useUTC: true
                                        },
                        
                                        rangeSelector: {
                                            buttons: [{
                                                count: 3,
                                                type: 'minute',
                                                text: '3m'
                                            },{
                                                count: 6,
                                                type: 'minute',
                                                text: '6m'
                                            },{
                                                count: 15,
                                                type: 'minute',
                                                text: '15m'
                                            },{
                                                count: 30,
                                                type: 'minute',
                                                text: '30m'
                                            },{
                                                type: 'all',
                                                text: 'Todo'
                                            }],
                                            inputEnabled: false,
                                            selected: 0
                                        },
                        
                                        title: {
                                            text: 'Temperatura Promedio [ °C ]'
                                        },
                        
                                        yAxis: {
                                            title: {
                                                text: 'Temperatura [ °C ]'
                                            },
                                            plotLines: [{
                                                value: {{$disp_maestro->temperatura_min}},
                                                color: 'red',
                                                dashStyle: 'shortdash',
                                                width: 2,
                                                label: {
                                                    text: 'Temperatura mínima'
                                                }
                                            }, {
                                                value: {{$disp_maestro->temperatura_max}},
                                                color: 'green',
                                                dashStyle: 'shortdash',
                                                width: 2,
                                                label: {
                                                    text: 'Temperatura máxima'
                                                }
                                            }]
                                        },
                        
                                        tooltip: {
                                            headerFormat: '<b>{point.y:.2f} [ °C ]</b>',
                                            pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Temperatura Promedio:</b> {point.y:.2f} [ °C ]'
                                        },
                        
                                        exporting: {
                                            enabled: true
                                        },
                        
                                        plotOptions: {
                                            series: {
                                            turboThreshold: 0 // Comment out this code to display error
                                            }
                                        },
                        
                                        series: []
                                    });
                                </script>
                            </head>
                        </div>                    
                        <div class="d-flex flex-row justify-content-end">
                            <div class="row">
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-text text-success">Temperatura Máximo: </span>
                                        <span class="description-percentage">
                                            {{$disp_maestro->temperatura_max}}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-text text-danger">Temperatura Mínimo: </span>
                                        <span class="description-percentage">
                                            {{$disp_maestro->temperatura_min}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                   
                    @if ($bateria2->cantidad_temperatura >= 1)
                        <br><div style="background: #e4eaf3"><br></div><br>    
                        <div id="temperatura1">            
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container4" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_temperatura1 = Highcharts.stockChart('container4', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Temperatura 1 [ °C ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Temperatura 1 [ °C ]'
                                                },
                                                plotLines: [{
                                                    value: {{$disp_maestro->temperatura_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura mínima'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->temperatura_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura máxima'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ °C ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Temperatura 1:</b> {point.y:.2f} [ °C ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                    
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-success">Temperatura Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-danger">Temperatura Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($bateria2->cantidad_temperatura >= 2)
                        <br><div style="background: #e4eaf3"><br></div><br>    
                        <div id="temperatura2">            
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container5" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_temperatura2 = Highcharts.stockChart('container5', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Temperatura 2 [ °C ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Temperatura 2 [ °C ]'
                                                },
                                                plotLines: [{
                                                    value: {{$disp_maestro->temperatura_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura mínima'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->temperatura_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura máxima'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ °C ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Temperatura 2:</b> {point.y:.2f} [ °C ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                    
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-success">Temperatura Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-danger">Temperatura Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($bateria2->cantidad_temperatura >= 3)
                        <br><div style="background: #e4eaf3"><br></div><br>    
                        <div id="temperatura3">            
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container6" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_temperatura3 = Highcharts.stockChart('container6', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Temperatura 3 [ °C ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Temperatura 3 [ °C ]'
                                                },
                                                plotLines: [{
                                                    value: {{$disp_maestro->temperatura_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura mínima'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->temperatura_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura máxima'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ °C ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Temperatura 3:</b> {point.y:.2f} [ °C ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                    
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-success">Temperatura Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-danger">Temperatura Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif                   
                    @if ($bateria2->cantidad_temperatura >= 4)
                        <br><div style="background: #e4eaf3"><br></div><br>    
                        <div id="temperatura4">            
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container7" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_temperatura4 = Highcharts.stockChart('container7', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Temperatura 4 [ °C ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Temperatura 4 [ °C ]'
                                                },
                                                plotLines: [{
                                                    value: {{$disp_maestro->temperatura_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura mínima'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->temperatura_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura máxima'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ °C ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Temperatura 4:</b> {point.y:.2f} [ °C ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                    
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-success">Temperatura Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-danger">Temperatura Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif                   
                    @if ($bateria2->cantidad_temperatura >= 5)
                        <br><div style="background: #e4eaf3"><br></div><br>    
                        <div id="temperatura5">            
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container8" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_temperatura5 = Highcharts.stockChart('container8', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Temperatura 5 [ °C ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Temperatura 5 [ °C ]'
                                                },
                                                plotLines: [{
                                                    value: {{$disp_maestro->temperatura_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura mínima'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->temperatura_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura máxima'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ °C ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Temperatura 5:</b> {point.y:.2f} [ °C ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                    
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-success">Temperatura Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-danger">Temperatura Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif                   
                    @if ($bateria2->cantidad_temperatura >= 6)
                        <br><div style="background: #e4eaf3"><br></div><br>    
                        <div id="temperatura6">            
                            <div class="row">
                                <head>
                                    <div class="container-fluid" id="container9" style="height: 400px; min-width: 100%"></div>
                                    <script>
                                        var chart_temperatura6 = Highcharts.stockChart('container9', {
                                            chart: {
                                                
                                                events: {
                                                    load: function () {
                                                    }
                                                }
                                            },
                                            time: {
                                                useUTC: true
                                            },
                            
                                            rangeSelector: {
                                                buttons: [{
                                                    count: 3,
                                                    type: 'minute',
                                                    text: '3m'
                                                },{
                                                    count: 6,
                                                    type: 'minute',
                                                    text: '6m'
                                                },{
                                                    count: 15,
                                                    type: 'minute',
                                                    text: '15m'
                                                },{
                                                    count: 30,
                                                    type: 'minute',
                                                    text: '30m'
                                                },{
                                                    type: 'all',
                                                    text: 'Todo'
                                                }],
                                                inputEnabled: false,
                                                selected: 0
                                            },
                            
                                            title: {
                                                text: 'Temperatura 6 [ °C ]'
                                            },
                            
                                            yAxis: {
                                                title: {
                                                    text: 'Temperatura 6 [ °C ]'
                                                },
                                                plotLines: [{
                                                    value: {{$disp_maestro->temperatura_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura mínima'
                                                    }
                                                }, {
                                                    value: {{$disp_maestro->temperatura_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Temperatura máxima'
                                                    }
                                                }]
                                            },
                            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ °C ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Temperatura 6:</b> {point.y:.2f} [ °C ]'
                                            },
                            
                                            exporting: {
                                                enabled: true
                                            },
                            
                                            plotOptions: {
                                                series: {
                                                turboThreshold: 0 // Comment out this code to display error
                                                }
                                            },
                            
                                            series: []
                                        });
                                    </script>
                                </head>
                            </div>                    
                            <div class="d-flex flex-row justify-content-end">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-success">Temperatura Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-danger">Temperatura Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp_maestro->temperatura_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>