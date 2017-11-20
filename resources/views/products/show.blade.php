@extends('layout')

@section('content')
	<div class="col-xs-12 col-sm-12">
		<h2>
			<strong>#{{ $product->id }}</strong> {{ $product->name }}
			<a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary pull-right">
				Editar
			</a>
			<a href="{{ route('products.index') }}" class="btn btn-default pull-right" style="margin-right: 5px;">
				Regresar
			</a>
		</h2>
		<hr>
		<p>{{ $product->short }}</p>
		<p>{{ $product->body }}</p>

		
	</div>
@endsection