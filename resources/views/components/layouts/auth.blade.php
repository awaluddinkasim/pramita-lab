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

<body>
    <div class="grid lg:grid-cols-8 max-h-screen">
        <div class="lg:col-span-3">
            <div class="place-content-center overflow-y-auto overflow-x-hidden h-screen">
                <div class="px-12 xl:px-28 py-15">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="col-span-5 hidden lg:block bg-gray-200">
            <div class="h-screen w-full p-7">
                <img src="{{ asset('assets/images/auth.jpg') }}" alt=""
                    class="object-cover w-full h-full rounded-xl">
            </div>
        </div>
    </div>

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
