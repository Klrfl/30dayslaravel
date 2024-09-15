<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $title ? $title . ' - GuitarDB' : 'GuitarDB' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body>
    <x-navbar />

    <main
      class="mx-auto max-w-6xl grid-flow-row gap-4 p-4 md:grid md:grid-cols-6"
    >
      {{ $slot }}
    </main>
  </body>
</html>
