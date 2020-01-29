@extends('layout')
@section('contenido')
<div class="container">
    @if(session()->has('info'))
    <div id="session" class="alert alert-success" role="alert">
        <span>{{session('info')}}</span>
    </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start">
            <h3 style="margin:5px">Cobros</h3>
        </div>

        <div class="col-xs-12 col-sm-3 col-lg-3 offset-6 justify-content-start">
            <a class="btn btn-primary m-1" href="{{route('cobros.create')}}" role="button" id="btnCreatecobro">Nuevo
                Cobro</a>
        </div>

    </div>

    @if (count($cobros)==0 || is_null($cobros))
    <hr>
    <h3>No hay Registros</h3>
    @else

    <div class="row justify-content-center ">
        <table class="table table-striped table-responsive-xl table-responsive-sm">
            <thead>
                <tr>
                    <th style="width:10%">id</th>
                    <th style="width:10%">Fecha</th>
                    <th style="width:20%">Cliente</th>
                    <th style="width:30%">Monto</th>
                    <th style="width:30%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cobros as $cobro)
                <tr>
                    <td>{{$cobro->id}}</td>
                    <td>{{date('d-M-Y',strtotime($cobro->fechacobro))}}</td>
                    <td>{{$cobro->cliente->nombre}}</td>
                    <td>{{$cobro->monto}}€</td>
                    <td class="form-inline">
                        <a href="{{route('cobros.show',$cobro->id )}}"
                            class="btn btn-primary btn-sm m-1 align-content-end">Ver</a>
                        {{-- <form action="{{route('cobros.destroy', $cobro->id )}}" method="post">
                        {!!method_field('DELETE')!!}
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-danger btn-sm m-1 align-content-end">Borrar</button>
                        </form> --}}
                        <button type="button" class="btn btn-danger btn-sm m-1 btnDelete" data-toggle="modal"
                            data-target="#modalDelete" data-id="{{$cobro->id}}" data-nombre="">
                            Eliminar
                        </button>
                    </td>
                    {{-- <div class="card" style="width: 18rem; margin:5px">
                        <img src="{{$cobro->img_src}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-text">{{$cobro->nombre}}</p>
                            </div>
                            <div class="col">
                                <a href="{{route('cobros.show',$cobro->id )}}"
                                    class="btn btn-primary align-content-end">Ver</a>
                            </div>
                        </div>
                    </div>
    </div> --}}
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endif
{{-- @if(session()->has('info'))
<script>
    alert('{{session('info')}}')
</script>
@endif --}}
@include('cobros.cobrosModal')
</div>
@stop
