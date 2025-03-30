<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @if (isset($title))
            {{ $title }} | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-blue-50 dark:bg-blue-900">
    <x-sidebar />

    <x-header />

    <main class="lg:ms-64 px-7 py-10">
        <div class="max-w-[100rem] w-full mx-auto">
            <h1 class="text-4xl dark:text-white font-medium mb-5">{{ $title ?? config('app.name') }}</h1>
            {{ $slot }}
        </div>
    </main>

    @if (Session::has('success'))
        <script type="module">
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}'
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script type="module">
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ Session::get('error') }}'
            })
        </script>
    @endif

    @stack('scripts')
</body>

</html>
