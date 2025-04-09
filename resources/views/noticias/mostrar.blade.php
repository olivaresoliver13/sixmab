<style>
  .modal-content {
    border: 0;
    border-radius: 0;
    box-shadow: 0;
  }
</style>
<script>
  function abrir(url) {
    open(url,'','top=120,left=300,width=900,height=650') ;
  }
</script>

@extends('includes.modal-content')

@if ($noticia->foto === Null)
  <img src="{{asset('img/noticia/noticias.png')}}" alt="" class="w-100"/>   
@else
  <img src="{{asset('img/noticia/'.$noticia->foto)}}" alt="" class="w-100"/>              
@endif  

@section('titulo')
  <i class="fas fa-bullhorn"></i> {{$noticia->titulo}}
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item text-justify">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$noticia->texto1}}
      @isset($noticia->texto2)
      <br><br> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $noticia->texto2 }}
      @endisset      
      @isset($noticia->texto3)
      <br><br> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $noticia->texto3 }}
      @endisset  
      @isset($noticia->texto4)
      <br><br> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $noticia->texto4 }}
      @endisset      
      @isset($noticia->texto5)
      <br><br> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $noticia->texto5 }}
      @endisset     
    </li>
    <li class="list-group-item text-left">
      <b>Fecha de la publicación:</b> {{ date('d M Y', $noticia->created_at->timestamp) }} <br> <b>Autor:</b> {{ $noticia->autor }} <br> 
      @isset($noticia->link)
      <b>Link:</b> <a href="javascript:abrir('{{ $noticia->link }}')">{{ $noticia->link }}</a>
      @endisset      
      </li>
  </ul>
@endsection