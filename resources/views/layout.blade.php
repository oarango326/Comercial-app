<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
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
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary container">
        <a class="navbar-brand {{activa('/')}}" href="/" >Gesticomer</a>
        <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar links -->
        <div  class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{activa('home')}}">
                    <a class="nav-link " href="{{route('home')}}" >Home </a>
                </li>
                <li class="nav-item {{activa('cliente*') }}">
                    <a class="nav-link " href="{{route('clientes.index')}}">Clientes</a>
                </li>
                <li class="nav-item {{activa('visita*') }}">
                    <a class="nav-link " href="{{route('visita.index')}}">Visitas</a>
                </li>
                <li class="nav-item {{activa('cobro*') }}">
                    <a class="nav-link " href="#">Cobros</a>
                </li>
                <li class="nav-item {{activa('tablas*') }}">
                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#"
                        role="link" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Tablas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('articulos.index')}}">Articulos</a>
                            <a class="dropdown-item" href="{{route('fabricantes.index')}}">Fabricantes</a>
                            <a class="dropdown-item" href="{{route('categorias.index')}}">Categorias</a>
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

<div class="container p-3" >
    @yield('contenido')
</div>

<footer class="page-footer footer font-small pt-4">
    <div class="container">
        @ {{ now()->year }}
    </div>
</footer>

</body>
</html>
