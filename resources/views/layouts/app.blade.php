<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- Mengatur bahasa aplikasi berdasarkan locale -->
<head>
    <meta charset="utf-8"> <!-- Mengatur karakter set dokumen -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Mengatur viewport untuk responsif -->
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF token untuk keamanan form -->
  
    <title> @yield('title') | {{ config('app.name', 'LSP Fauzi') }}</title> <!-- Judul halaman -->

   <!-- Menghubungkan file CSS dan JS dari CDN -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/charts/chart-10/assets/css/chart-10.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- Mengatur padding body -->
   <style>
        body {
            padding-top: 100px; /* Sesuaikan nilai ini sesuai dengan tinggi navbar Anda */
        }
    </style>
    @yield('custom-css') <!-- Tempat untuk menambahkan CSS kustom -->
</head>
<body>
    <div id="app">
        @include('partials.navbar') <!-- Menyertakan navbar -->
        @yield('content') <!-- Tempat untuk konten halaman -->
    </div>
    @yield('custom-js') <!-- Tempat untuk menambahkan JS kustom -->
</body>
</html>