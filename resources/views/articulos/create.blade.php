@extends('layout')
@section('contenido')
    <div class="form-group align-center">
        <h1>Nuevo Articulo</h1>
            <form action="{{route('articulos.store')}}" method="post">
                {{ csrf_field() }}
                <div >
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 custom-file">
                                <img src="{{url('/images/NO_IMG_600x600.png')}}" alt="" width="300" height="300">
                                <input type="file" name="imgupload" id="imgupload" class="form-control">
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label for="lblcliente">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="lblcliente">Codigo</label>
                                <input type="text" class="form-control" name="codigo" value="{{old('codigo')}}" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="lblcif">EAN</label>
                                <input type="text" class="form-control" name="ean" value="{{old('ean')}}" onkeypress="javascript:return isNumber(event)" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="lblcif">Precio</label>
                                <input type="text" class="form-control" name="precio" value="{{old('precio')}}" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="lblcategoria">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-control" required>
                                        <option disabled selected value="0"> Seleccione una Categoria... </option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="lblfabricante">Fabricante</label>
                                <select name="fabricante_id" id="fabricante_id" class="form-control" required>
                                        <option disabled selected value="0"> Seleccione un Fabricante... </option>
                                    @foreach ($fabricantes as $fabricante)
                                        <option value="{{$fabricante->id}}">{{$fabricante->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start">
                                <a class="btn btn-primary align" style="margin:5px"  href="{{route('articulos.index')}}" role="button">Volver</a>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                                <input type="submit" class="btn btn-primary align" style="margin:5px"  role="button" value="Guardar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <script>
    //javascript function onlynumbers
        function isNumber(evt) {
            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
            if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                return false;
            return true;
        }
    </script>
    @stop

