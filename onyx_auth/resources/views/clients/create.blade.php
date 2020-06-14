@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('clients.create') }}

			<!-- Session messages -->
			@include('partials.session_message')

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Crear cliente por: {{auth()->user()->name}}</span>
				</div>

				<div class="card-body">
					@include('partials.session_message')
					@include('partials.errors')

					{!! Form::open(['route' => 'clients.store']) !!}
							@include('clients.partials.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection