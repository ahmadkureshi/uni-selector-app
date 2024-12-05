<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Spinnaker&family=Satisfy&display=swap" rel="stylesheet">
    <title>@yield('title', 'Home Page')</title>
    @vite('resources/css/app.css')

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex flex-col min-h-screen">

{{-- Header --}}
@include('elements.header')

{{-- Optional Overlay --}}
@yield('overlay')

{{-- Main Content --}}
<main class="flex-grow bg-gray_900_d3">
    <div class="container mx-auto px-16  @if(request()->is('user/*') || request()->is('admin/*') ) py-12 @else py-60 @endif">
        @if(session('success'))
            <div id="flash-message" class="bg-green-500 text-white px-4 py-3 rounded shadow-md fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div id="flash-message" class="bg-red-500 text-white px-4 py-3 rounded shadow-md fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </div>
</main>

{{-- Footer --}}
@include('elements.footer')

{{-- Flash Message --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.remove();
            }, 2500); // 2.5 seconds
        }
    });
</script>

{{-- Add Custom Sripts --}}
@yield('scripts')

</body>
</html>
