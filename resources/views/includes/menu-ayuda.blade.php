<style>
    .ac-container {
        max-width: 400px;
    }

    .ac-container label {
        height: 30px !important;
        line-height: 21px !important;
        font-size: 12px !important;
        font-family: 'Open Sans','Arial Narrow',Arial,sans-serif !important;
        padding: 5px 20px;
        position: relative;
        z-index: 20;
        display: block;
        height: 30px;
        cursor: pointer;
        color: #777;
        text-shadow: 1px 1px 1px rgba(255,255,255,0.8);
        line-height: 33px;
        font-size: 19px;
        background: #fff;
        background: -moz-linear-gradient(top,#fff 1%,#eaeaea 100%);
        background: -webkit-gradient(linear,left top,left bottom,color-stop(1%,#fff),color-stop(100%,#eaeaea));
        background: -webkit-linear-gradient(top,#fff 1%,#eaeaea 100%);
        background: -o-linear-gradient(top,#fff 1%,#eaeaea 100%);
        background: -ms-linear-gradient(top,#fff 1%,#eaeaea 100%);
        background: linear-gradient(top,#fff 1%,#eaeaea 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff',endColorstr='#eaeaea',GradientType=0 );
        box-shadow: 0 0 0 1px rgba(155,155,155,0.3),1px 0 0 rgba(255,255,255,0.9) inset,0 2px 2px rgba(0,0,0,0.1);
        font-size: 12px;
        height: 30px;
        line-height: 20px;
    }

    .ac-container {
        width: 100%;
        margin: 10px auto 30px auto;
        text-align: left;
    }

    .ac-container label:hover {
        background: #fff;
    }

    .ac-container input:checked + label,.ac-container input:checked + label:hover {
        background: #f1f2f3;
        color: #666;
        text-shadow: 0 1px 1px rgba(255,255,255,0.6);
        box-shadow: 0 0 0 1px rgba(155,155,155,0.3),0 2px 2px rgba(0,0,0,0.1);
        height: 30px;
        line-height: 21px;
        font-size: 13px;
    }

    .ac-container label:hover:after,.ac-container input:checked + label:hover:after {
        content: '';
        position: absolute;
        width: 24px;
        height: 24px;
        right: 13px;
        top: 7px;
        background: transparent url(../img/arrow_down.png) no-repeat center center;
    }

    .ac-container input:checked + label:hover:after {
        background-image: url(../img/arrow_up.png);
    }

    .ac-container input {
        display: none;
    }

    .ac-container article {
        margin-top: -1px;
        overflow: hidden;
        height: 0;
        position: relative;
        z-index: 10;
        -webkit-transition: height 0.3s ease-in-out,box-shadow 0.6s linear;
        -moz-transition: height 0.3s ease-in-out,box-shadow 0.6s linear;
        -o-transition: height 0.3s ease-in-out,box-shadow 0.6s linear;
        -ms-transition: height 0.3s ease-in-out,box-shadow 0.6s linear;
        transition: height 0.3s ease-in-out,box-shadow 0.6s linear;
    }

    .ac-container article p {
        font-style: normal;
        line-height: 23px;
        padding: 20px;
    }

    .ac-container input:checked ~ article {
        -webkit-transition: height 0.5s ease-in-out,box-shadow 0.1s linear;
        -moz-transition: height 0.5s ease-in-out,box-shadow 0.1s linear;
        -o-transition: height 0.5s ease-in-out,box-shadow 0.1s linear;
        -ms-transition: height 0.5s ease-in-out,box-shadow 0.1s linear;
        transition: height 0.5s ease-in-out,box-shadow 0.1s linear;
        box-shadow: 0 0 0 1px rgba(155,155,155,0.3);
    }

    .ac-container input:checked ~ article.ac-small {
        height: 140px;
    }

    .ac-container input:checked ~ article.ac-medium {
        height: 180px;
    }

    .ac-container input:checked ~ article.ac-large {
        height: 230px;
    }
</style>

<script>
    function abrir(url) {
        open(url,'','top=120,left=300,width=900,height=650') ;
    }
</script>

<section class="ac-container">
    <p style="padding: 0 10px; text-align: justify; font-size: 13px; color: #fff;">En esta sección podras descargar material de ayuda sobre el funcionamientos del aplicativo SIXMAB</p>
    <div>
        <input id="ac-1" name="accordion-1" type="radio">
        <label for="ac-1">Configuración</label>
        <article class="ac-small">
            {{--  <div style="padding-left: 10px;"><a href="javascript:abrir('ayuda/eternity.pdf')"><i class="far fa-file-pdf" style="left: -4px; position: relative;"></i>eternity</a></div>  --}}
        </article>
    </div>
    <div>
        <input id="ac-2" name="accordion-1" type="radio">
        <label for="ac-2">Módulo</label>
        <article class="ac-medium">
        </article>
    </div>
    <div>
        <input id="ac-3" name="accordion-1" type="radio">
        <label for="ac-3">Informe</label>
        <article class="ac-large">
        </article>
    </div>
    <div>
        <input id="ac-4" name="accordion-1" type="radio">
        <label for="ac-4">Mantenimiento</label>
        <article class="ac-large">
        </article>
    </div>
    <div>
        <input id="ac-5" name="accordion-1" type="radio" checked="">
        <label for="ac-5">Contacto</label>
        <article class="ac-large">
            <div>
                <img style="left:83px; top:10px; position:relative; width:89px;" src="{{asset('img/ayuda.png')}}" alt=""/>
                <p style="font-size: 13px;">
                    Call: +569 6561 7745 / +569 3202 6364<br>
                    Lunes - Viernes (09:00 - 18:00)<br>
                    Email: <a href="mailto:oolivares@biobusiness.cl">info@biobusiness.cl</a><br>
                    Ubicación: Blanco 1041, Oficina 49. Valparaíso, Chile.
                </p>
            </div>
        </article>
    </div>
</section>