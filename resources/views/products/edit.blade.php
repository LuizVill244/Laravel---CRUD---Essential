@extends('layout')

@section('content')
<div class="col-xs-12 col-sm-12">
	<h2>
		<strong>#{{ $product->id }}</strong> {{ $product->name }}
		<a href="{{ route('products.index') }}" class="btn btn-default pull-right" style="margin-right: 5px;">
			Regresar
		</a>
	</h2>
	<hr>
		@include('products.partials.errors')
		{!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}
			
			@include('products.partials.form')
			
		{!! Form::close() !!}
	</div>

@endsection