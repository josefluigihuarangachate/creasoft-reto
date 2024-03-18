<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Creasoft - Login</title>
        <link rel="shortcut icon" href="https://creasoft.com.pe/public/img/logo/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="{{ asset('assets/css/style_login.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>

    <div class="container">
            <div class="wrapper">
              <div class="title"><span>Creasoft | Login</span></div>
              <form method="POST" action="#">
                <div class="row">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Usuario" id="txtusuario" name="txtusuario" required>
                </div>
                <div class="row">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Contraseña" id="txtpassword" name="txtpassword" required>
                </div>
                <div class="row button">
                  <input type="button" id="btnlogin" name="btnlogin" value="Iniciar Sesion">
                </div>
                <div class="signup-link">- Creado por Luigi Huaranga -</div>
              </form>
            </div>
          </div>
        </div>

        <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
        <script src="{{ asset('assets/js/notify.js') }}"></script>
        <script src="{{ asset('assets/js/login.js?v=') }}<?php echo date('YmdHis'); ?>"></script>
    </body>
</html>
