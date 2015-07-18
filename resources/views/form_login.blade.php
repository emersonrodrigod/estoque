@extends('layout.principal') @section('conteudo')

<h1>Novo produto</h1>

@if(count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li> @endforeach
	</ul>
</div>
@endif

<form action="/login" method="post">

	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

	<div class="form-group">
		<label>Email</label> <input name="email" class="form-control" />
	</div>
	<div class="form-group">
		<label>Password</label> <input name="password" type="password" class="form-control" />
	</div>
	<button type="submit" class="btn btn-primary btn-block">Login</button>
</form>

@stop
