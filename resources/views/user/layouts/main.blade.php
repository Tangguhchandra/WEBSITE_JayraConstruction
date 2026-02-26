<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Darming Jaya Group')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    {{-- NAVBAR --}}
    @include('user.layouts.navbar')

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('user.layouts.footer')

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