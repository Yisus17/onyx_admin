@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

		<!-- Breadcrumbs -->
		{{ Breadcrumbs::render('clients.edit', $client) }}

		<!-- Session messages -->
		@include('partials.session_message')


			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Editar cliente por: {{auth()->user()->name}}</span>
				</div>

				<div class="card-body">
					{!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT']) !!}
							@include('clients.partials.form')
					{!! Form::close() !!}
				</div>
				</div>
		</div>
	</div>
</div>
@endsection