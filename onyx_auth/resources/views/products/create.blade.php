@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('products.create') }}

			<!-- Session messages -->
			@include('partials.session_message')

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Crear producto por: {{auth()->user()->name}}</span>
				</div>

				<div class="card-body">

					{!! Form::open(['route' => 'products.store', 'id' => 'product_form', 'files' => true]) !!}
							@include('products.partials.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

