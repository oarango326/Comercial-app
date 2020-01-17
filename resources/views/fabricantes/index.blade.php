@extends('layout')
@section('contenido')
    <div class="row" >
        <div class="col-xs-6 col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start" >
                <h3  style="margin:5px">Fabricantes</h3>
        </div>
        <div class="  col-xs-6 col-sm-3 col-lg-3 offset-lg-6 justify-content-start" >
            <a class="btn btn-primary m-1"  href="{{route('fabricantes.create')}}" role="button">Nuevo </a>
        </div>
    </div>

    <div>
        @if (count($fabricantes)==0 || is_null($fabricantes))
            <hr>
            <h3>No hay Registros</h3>
        @else
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:10%">Id</th>
                            <th style="width:70%">Nombre</th>
                            <th style="width:20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fabricantes as $fabricante)
                            <tr>
                                <td class="d-xs-none">
                                    {{$fabricante->id}}
                                </td>
                                <td class="d-xs-none">
                                    <a href="{{route('fabricantes.show',$fabricante->id)}}">{{$fabricante->nombre}}</a>
                                </td>
                                <td >
                                    {{-- <a class="btn btn-primary btn-sm m-1" href="{{route('fabricantes.show',$fabricante->id)}}" role="button">Ver</a> --}}
                                    <a class="btn btn-primary btn-sm m-1" href="{{route('fabricantes.edit',$fabricante->id)}}" role="button">Modificar</a>
                                    <button type="button" class="btn btn-danger btn-sm m-1 btnDelete" data-toggle="modal" data-target="#modalDelete" data-id="{{$fabricante->id}}" data-nombre="{{$fabricante->nombre}}">
                                        Eliminar
                                      </button>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

        @endif
        @if(session()->has('info'))
            <script>
                alert('{{session('info')}}')
            </script>
        @endif
        @include('fabricantes.fabricanteModal')
    </div>
@stop
