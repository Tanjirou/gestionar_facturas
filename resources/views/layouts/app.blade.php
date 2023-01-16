<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIADF - @yield('titulo')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body class="bg-gray-100">
    <div id="app">
        <header class=" border-b bg-white shadow">
            <div class="container d-flex justify-content-between align-items-center">
                <h1 class="">SIADF</h1>
                <nav class=" d-flex align-content-center align-items-center justify-content-end ">
                    @auth
                        <a href="{{route('dashboard')}}" class="text-dark">Hola: <span
                                class="font-normal">{{ auth()->user()->name }}</span></a>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn bg-light text-sm">Cerrar Sesión</button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{route('login')}}" class="mr-3 text-decoration-none">Iniciar Sesión</a>
                        <a href="{{route('register')}}" class="text-decoration-none">Crear Cuenta</a>
                    @endguest

                </nav>
            </div>
        </header>
        <main class="container mx-auto mt-4">
            <h2 class="text-center mb-3">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>
    </div>


    <footer class="mt-5 text-center">
        Todos los derechos reservados {{ now()->year }}
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
