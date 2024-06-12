<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @yield('title')
  </title>
  @yield('link')
  <!-- AlpineJS -->
  <script src="https://unpkg.com/alpinejs" defer></script>
  @vite('resources/css/app.css')
</head>

<body>
  @include('layouts.clients.header')
  @yield('content')
  @include('layouts.clients.footer')

  @yield('scripts')
</body>

</html>