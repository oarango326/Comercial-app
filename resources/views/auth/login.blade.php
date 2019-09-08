@extends('layout')
@section('contenido')
<h1>Login</h1>
<div>
	<form action="/login" method="POST" class="form-inline">
		{!! csrf_field() !!}
		<input class="form-control" type="email" name="email" placeholder="email">
		<input class="form-control" type="password" name="password" placeholder="Password">
		<input class="form-control btn btn-primary" type="submit" name="btn-submit" value="Entrar">
	</form>
</div>

@stop