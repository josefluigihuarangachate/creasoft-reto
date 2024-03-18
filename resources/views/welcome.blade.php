<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="https://creasoft.com.pe/public/img/logo/favicon.ico" />

        <title>Creasoft</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>

    <div class="slider-container">
  <div class="slider-wrapper">
    <div class="slider">
        <div style="position: absolute;width: 100%;">
            <div class="caja">
                <div class="caja_hijo">
                    <form>
                        <label class="label_titulo"><label class="parentesis">¡</label>NUEVAS PROMOS<br>
                        ESTE 2023<label class="parentesis">!</label></label><br>
                        <label class="label_subtitulo">Tenemos nuevos planes para ti</label><br>
                        <label class="label_subtitulo2">Fibra Óptica para tu hogar:</label><br>
                        <center><input type="text"class="input_celular" placeholder="Ingresa tu celular" maxlength="9" onkeypress="return validateNumber(event)" id="num_celular" name="num_celular" style="text-align: center;"></center>
                        <center><input type="text" class="input_dni" placeholder="DNI" style="text-align: center;" maxlength="8" onkeypress="return validateNumber(event)" id="dni" name="dni"></center><br>
                        <input type="checkbox" id="chckmarcar" name="chckmarcar" value="true"> <label for="chckmarcar" class="chck_terminos"> Acepta las <a href="#">politicas de privacidad</a> </label><br><br>
                        <center><input type="button" class="btn_llamame" id="btnllamame" name="btnllamame" value="LLÁMENME"></center>
                    </form>
                </div>
            </div>
            <div class="caja"></div>
        </div>
        <img src="{{ URL::asset('assets/img/Imagen1.png') }}" alt="Image 1" />
        <img src="{{ URL::asset('assets/img/Imagen1.png') }}" alt="Image 2" />
        <img src="{{ URL::asset('assets/img/Imagen1.png') }}" alt="Image 3" />
      
      <!-- Add more images as needed -->
    </div>
  </div>
  <button class="prev" onclick="prevSlide()">❮</button>
  <button class="next" onclick="nextSlide()">❯</button>
</div>

        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
        <script src="{{ asset('assets/js/notify.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
                }
            });
        </script>
        <script src="{{ asset('assets/js/solicitar.js') }}"></script>
    </body>
</html>
