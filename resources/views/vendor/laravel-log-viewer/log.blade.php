@extends('layouts.layouts')

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{asset('favicons/favicon.png')}}">
    <link rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      body {
        padding: 25px;
      }

      h1 {
        font-size: 1.5em;
        margin-top: 0;
      }
      .btn {
          font-size: 0.7rem;
      }

      .stack {
        font-size: 0.85em;
      }

      .date {
        min-width: 75px;
      }

      .text {
        word-break: break-all;
      }

      a.llv-active {
        z-index: 2;
        background-color: #f5f5f5;
        border-color: #777;
      }

      .list-group-item {
        word-break: break-word;
      }

      .folder {
        padding-top: 15px;
      }

      .div-scroll {
        height: 80vh;
        overflow: hidden auto;
      }
      .nowrap {
        white-space: nowrap;
      }
      .row1 {
        margin: 50px 0 0 50px !important;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row row1">
        <div class="col sidebar mb-3">
          <h1><i class="fa fa-calendar" aria-hidden="true"></i> Log</h1>

          <div class="custom-control custom-switch" style="padding-bottom:20px;">
            <input type="checkbox" class="custom-control-input" id="darkSwitch">
          </div>

          <div class="list-group div-scroll">
            @foreach($folders as $folder)
              <div class="list-group-item">
                <a href="?f={{ \Illuminate\Support\Facades\Crypt::encrypt($folder) }}">
                  <span class="fa fa-folder"></span> {{$folder}}
                </a>
                @if ($current_folder == $folder)
                  <div class="list-group folder">
                    @foreach($folder_files as $file)
                      <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}&f={{ \Illuminate\Support\Facades\Crypt::encrypt($folder) }}"
                        class="list-group-item @if ($current_file == $file) llv-active @endif">
                        {{$file}}
                      </a>
                    @endforeach
                  </div>
                @endif
              </div>
            @endforeach
            @foreach($files as $file)
              <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}"
                class="list-group-item @if ($current_file == $file) llv-active @endif">
                {{$file}}
              </a>
            @endforeach
          </div>
        </div>
        <div class="col-10 table-container">
          @if ($logs === null)
            <div>
              Archivo de registro debe ser mayor a 50M, descárguelo.
            </div>
          @else
            <table id="table-log" class="table table-striped" data-ordering-index="{{ $standardFormat ? 2 : 0 }}">
              <thead>
              <tr>
                @if ($standardFormat)
                  <th>{{ __('adminlte::adminlte.Level') }}</th>
                  <th>{{ __('adminlte::adminlte.Context') }}</th>
                  <th>{{ __('adminlte::adminlte.Date') }}</th>
                @else
                  <th>{{ __('adminlte::adminlte.Line-number') }}</th>
                @endif
                <th>{{ __('adminlte::adminlte.Content') }}</th>
              </tr>
              </thead>
              <tbody>

              @foreach($logs as $key => $log)
                <tr data-display="stack{{{$key}}}">
                  @if ($standardFormat)
                    <td class="nowrap text-{{{$log['level_class']}}}">
                      <span class="fa fa-{{{$log['level_img']}}}" aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                    </td>
                    <td class="text">{{$log['context']}}</td>
                  @endif
                  <td class="date">{{{$log['date']}}}</td>
                  <td class="text">
                    @if ($log['stack'])
                      <button type="button"
                              class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                              data-display="stack{{{$key}}}">
                        <i class="fas fa-search"></i>
                      </button>
                    @endif
                    {{{$log['text']}}}
                    @if (isset($log['in_file']))
                      <br/>{{{$log['in_file']}}}
                    @endif
                    @if ($log['stack'])
                      <div class="stack" id="stack{{{$key}}}"
                          style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                      </div>
                    @endif
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
          @endif
          <br><br>
          <div class="p-3">
            @if($current_file)
              <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                <i class="fas fa-download"></i> {{ __('adminlte::adminlte.Download-file') }}
              </a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a id="clean-log" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                <i class="fas fa-sync"></i> {{ __('adminlte::adminlte.Clean-file') }}
              </a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                <i class="fas fa-trash"></i> {{ __('adminlte::adminlte.Delete-file') }}
              </a>&nbsp;&nbsp;&nbsp;&nbsp;
              @if(count($files) > 1)
                <a id="delete-all-log" href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                  <i class="fas fa-trash-alt"></i> {{ __('adminlte::adminlte.Delete-all-files') }}
                </a>&nbsp;&nbsp;&nbsp;&nbsp;
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery for Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous">
    </script>

    <script>
      // end darkmode js            
      $(document).ready(function () {
        $('.table-container tr').on('click', function () {
          $('#' + $(this).data('display')).toggle();
        });
        $('#table-log').DataTable({
          "order": [$('#table-log').data('orderingIndex'), 'desc'],
          "stateSave": true,
          "stateSaveCallback": function (settings, data) {
            window.localStorage.setItem("datatable", JSON.stringify(data));
          },
          "stateLoadCallback": function (settings) {
            var data = JSON.parse(window.localStorage.getItem("datatable"));
            if (data) data.start = 0;
            return data;
          }
        });
        $('#delete-log, #clean-log, #delete-all-log').click(function () {
          return confirm('{{ __('adminlte::adminlte.Are-you-sure') }}?');
        });
      });
    </script>
  </body>
</html>
