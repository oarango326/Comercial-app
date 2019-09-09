@extends('layout')
@section('contenido')
	<div class="row" >
        <div class="col-xs-3 d-flex justify-content-start" >
                <h3  style="margin:5px">Visitas</h3>
        </div>
        <div class="offset-3 d-flex justify-content-end" >
            <a class="btn btn-primary"  style="margin:5px" href="{{route('visita.create')}}" 
            role="button">Nueva Visita</a>
        </div>
    </div>
    <div class="table-responsive">
        @if (count($visitas)==0 || is_null($visitas))
            <h3>No hay visitas Registradas</h3>
        @else
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:20%">Ciudad</th>
                            <th style="width:10%">Cliente</th>
                            <th style="width:20%">Direccion</th>
                            <th style="width:15%">Proxima Visita</th>
                            <th style="width:150">Estado</th>
                            <th style="width:20%">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($visitas as $visita)
                        <tr>
                            <td>
                                {{ $visita->cliente->ciudad }}
                            </td>
                            <td>
                               <a href="{{route('visita.show', $visita->id)}}">{{ $visita->cliente->nombre }}</a>
                            </td>
                            <td>
                            	{{ $visita->cliente->direccion }}
                            </td>
                            <td>
                                {{ $visita->proxVisita }}
                            </td>
                            <td>
                                @if($visita->estado==0)
                                    <label for="lblestado0" style="color:orange" >Pendiente</label>
                                @elseif($visita->estado==1)
                                    <label for="lblestado1" style="color:green">Ejecutada</label>
                                @endif
                            </td>
                            <td >
                                @if($visita->estado==0)
                                	<form action="{{route('visita.destroy', $visita->id)}}" style="display:inline" method="POST">
                                        {!!method_field('DELETE')!!}
                                         {!! csrf_field() !!}
                                            <button class="btn btn-danger btn-sm" type="submit" >Eliminar</button>
                                    </form>
                                @endif
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
    </div>
@stop