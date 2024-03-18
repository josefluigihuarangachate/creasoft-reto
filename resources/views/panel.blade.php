<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Creasoft - Panel</title>
        <link rel="shortcut icon" href="https://creasoft.com.pe/public/img/logo/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="{{ asset('assets/css/style_panel.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    </head>
    <body>

    <div class="topnav" id="myTopnav">
      <a href="" class="active">Panel</a>
      <a href="#" id="cerrarsesion" name="cerrarsesion">Cerrar Sesión</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div style="padding-top:16px;padding-left: 20px;padding-right: 20px;">
      <a class="btnexportexcel" target="_blank" href="/exportExcel">Exportar Excel</a>
      <a class="btnexportpdf" target="_blank" href="/exportPDF">Exportar PDF</a>
      <br><br><br>
      <table id="tablesolicitar">
        <thead>
          <tr>
            <th>#</th>
            <th>Número de Celular</th>
            <th>DNI</th>
            <th>Hora Solicitada</th>
            <th>Fecha Solicitada</th>
          </tr>
        </thead>
        <tbody>
          @if(!$data)
            <tr>
              <td colspan="5"><center>No se encontraron datos</center></td>
            </tr>
          @else
            @foreach($data as $d)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->numero_celular }}</td>
                <td>{{ $d->dni }}</td>
                <td>{{ \Carbon\Carbon::parse($d->fechayhora_solicitada)->format('H:i:s') }}</td>
                <td>{{ \Carbon\Carbon::parse($d->fechayhora_solicitada)->format('d/m/Y') }}</td>
              </tr>
            @endforeach
          @endif

        </tbody>
      </table>
    </div>


        <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
        <script src="{{ asset('assets/js/notify.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
                }
            });
        </script>
        <script src="{{ asset('assets/js/panel.js') }}"></script>
    </body>
</html>
