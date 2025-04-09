@extends('layouts.layouts')

@section('titulo')
    <h1 class="m-0 text-dark"><i class="fas fa-chalkboard-teacher"></i>&ensp;Tablero de Usuario</h1>
@stop

@section('content')
    <br>
    <div class="content">
        <div class="row">
            @foreach ($number_blocks as $block)
                <div class="col-md-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <span>{{ $block['title'] }}</span><br>
                            <span style="font-size: 40px">{{ $block['number'] }}</span>
                        </div>

                        <div class="icon">
                            <i class="fas fa-users" style="color:#ffffff;"></i>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($number_blocks1 as $block)
                <div class="col-md-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <span>{{ $block['title'] }}</span><br>
                            <span style="font-size: 40px">{{ $block['number'] }}</span>
                        </div>

                        <div class="icon">
                            <i class="fas fa-users" style="color:#ffffff;"></i>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($number_blocks2 as $block)
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <span>{{ $block['title'] }}</span><br>
                            <span style="font-size: 40px">{{ $block['number'] }}</span>
                        </div>

                        <div class="icon">
                            <i class="fas fa-users" style="color:#ffffff;"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class="row">
            @foreach ($list_blocks as $block)
                <div class="col-md-12">
                    <h3>{{ $block['title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-success">
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Último inicio de sesión</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($block['entries'] as $entry)
                            <tr>
                                <td>{{ $entry->name }}</td>
                                <td>{{ $entry->email }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($entry->last_login_at)->format('d/m/Y H:i:s')}}</td>
                                <td class="text-center"><a href="mailto:{{$entry->email}}"><i class="far fa-envelope" data-toggle="tooltip" title="Enviar un correo" style="font-size: 20px;"></i></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">{{ __('Entradas no encontradas') }}</td>
                                <td class="text-center"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            @endforeach

            @foreach ($list_blocks1 as $block)
                <div class="col-md-12">
                    <h3>{{ $block['title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning">
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Último inicio de sesión</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($block['entries'] as $entry)
                                <tr>
                                    <td>{{ $entry->name }}</td>
                                    <td>{{ $entry->email }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($entry->last_login_at)->format('d/m/Y H:i:s')}}</td>
                                    <td class="text-center"><a href="mailto:{{$entry->email}}"><i class="far fa-envelope" data-toggle="tooltip" title="Enviar un correo" style="font-size: 20px;"></i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">{{ __('Entradas no encontradas') }}</td>
                                    <td class="text-center"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endforeach

            @foreach ($list_blocks2 as $block)
                <div class="col-md-12">
                    <h3>{{ $block['title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-danger">
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Último inicio de sesión</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($block['entries'] as $entry)
                            <tr>
                                <td>{{ $entry->name }}</td>
                                <td>{{ $entry->email }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($entry->last_login_at)->format('d/m/Y H:i:s')}}</td>
                                <td class="text-center"><a href="mailto:{{$entry->email}}"><i class="far fa-envelope" data-toggle="tooltip" title="Enviar un correo" style="font-size: 20px;"></i></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">{{ __('Entradas no encontradas') }}</td>
                                <td class="text-center"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
        <br>
        <div class="col-md-12">
            <div class="row">
                <div class="{{ $chart->options['column_class'] }}">
                    <h3>{!! $chart->options['chart_title'] !!}</h3>
                    {!! $chart->renderHtml() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    {!! $chart->renderJs() !!}
@endsection