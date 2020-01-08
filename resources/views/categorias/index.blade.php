@extends('layout')
@section('contenido')
    <div class="row" >
        <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start" >
                <h3  style="margin:5px">Categorias</h3>
        </div>
        <div class="  col-xs-12 col-sm-3 col-lg-3 offset-6 justify-content-start" >
        <a class="btn btn-primary m-1"  href="{{route('categorias.create')}}" role="button">Nueva Categoria</a>
        </div>
    </div>


        @if (count($categorias)==0 || is_null($categorias))
            <hr>
            <h3>No hay Registros</h3>
        @else
        <div class="row justify-content-center ">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:10%">Id</th>
                            <th style="width:70%">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td class="d-xs-none">
                                    {{$categoria->id}}
                                </td>
                                <td class="d-xs-none">
                                     <a href=" {{route('categorias.show',$categoria->id)}}">{{$categoria->nombre}}</a>
                                </td>
                                <td >
                                    <a class="btn btn-primary btn-sm m-1" href="{{route('categorias.edit',$categoria->id)}}" role="button">Modificar</a>
                                    <button type="button" class="btn btn-danger btn-sm m-1 btnDelete" data-toggle="modal" data-target="#modalDelete" data-id="{{$categoria->id}}" data-nombre="{{$categoria->nombre}}">
                                        Eliminar
                                      </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        @endif
        @if(session()->has('info'))
            <script>
                alert('{{session('info')}}')
            </script>
        @endif
        @include('categorias.categoriasModal')

@stop
