<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Darming Jaya Group')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    {{-- NAVBAR --}}
    @include('user.layouts.navbar')

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    @vite('resources/js/app.js')

    <script>
        const navbarInner = document.getElementById('navbar-inner');
        const navToggle = document.getElementById('navToggle');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 120) {
                navbarInner.classList.add(
                    'opacity-0',
                    'scale-95',
                    'translate-x-1',
                    'pointer-events-none'
                );
            } else {
                navbarInner.classList.remove(
                    'opacity-0',
                    'scale-95',
                    'translate-x-1',
                    'pointer-events-none'
                );
            }
        });

        navToggle.addEventListener('click', () => {
            navbarInner.classList.toggle('opacity-0');
            navbarInner.classList.toggle('scale-95');
            navbarInner.classList.toggle('translate-x-1');
            navbarInner.classList.toggle('pointer-events-none');
        });
    </script>

</body>
<body style="background-image: url('{{ asset('images/background.png') }}')">
</html>