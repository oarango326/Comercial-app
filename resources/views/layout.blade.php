<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script type="text/javascript" src="/js/app.js"></script>
    {{-- <title>Gesticomer</title> --}}
    <title>GESTICOMER</title>

</head>

<body>
    <?php
        function activa($url)
        {
            return  request()->is($url)? 'active': '';
        }
    ?>
<div id="app" class="d-flex flex-column justify-content-between">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary container">
            <a class="navbar-brand {{activa('/')}}" href="/">Gesticomer</a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link {{activa('home')}}" href="{{route('home')}}">Home </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  {{activa('cliente*') }}" href="{{route('clientes.index')}}">Clientes</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{activa('visita*') }}" href="{{route('visita.index')}}">Visitas</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{activa('factura*') }}" href="{{route('facturas.index')}}">Facturas</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{activa('cobro*') }} " href="{{route('cobros.index')}}">Cobros</a>
                    </li>
                    <li class="nav-item ">
                        <div class="dropdown show">
                            <a class="nav-link dropdown-toggle" href="#" role="link"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tablas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item {{activa('articulo*') }}"
                                    href="{{route('articulos.index')}}">Articulos</a>
                                <a class="dropdown-item {{activa('fabricante*') }}"
                                    href="{{route('fabricantes.index')}}">Fabricantes</a>
                                <a class="dropdown-item {{activa('categoria*') }}"
                                    href="{{route('categorias.index')}}">Categorias</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item {{activa('config*') }}">
                        <a class="nav-link " href="{{route('configuraciones')}}">Configuraciones</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="py-3">
        @yield('contenido')
    </main>
    <footer class=" text-center text-black-50 py-3 shadow">
        <div>
           Copyright @ {{ now()->year }}
        </div>
    </footer>
</div>
</body>


</html>
