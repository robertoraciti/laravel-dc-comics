<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>

  <!-- Styles -->
  @vite('resources/js/app.js')
  @yield('css')
</head>

<body>
  @include('partials._navbar')

  <main>
    <div class="container mt-5">
      @if (session ('message'))
        <div class="alert alert-success mb-5">
          {{ session('message') }}
        </div>
      @endif
    </div>
    @yield('main-content')

    @yield('modals')
  </main>

</body>

</html>
