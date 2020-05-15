@extends('layouts.app')

@section('content')
   
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Detalles del cliente</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th>Nombre (Razón social) </th>
								<td>{{$client->name}}</td>
							</tr>
							<tr>
								<th>Dirección</th>
								<td>{{$client->address}}</td>
							</tr>
							<tr>
								<th>Teléfono</th>
								<td>{{$client->phone}}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{$client->email}}</td>
							</tr>
						</tbody>
					</table>
					<a href="{{route('clients.edit', $client)}}" class="btn btn-primary">Editar</a>
					<a href="/clients" class="btn btn-secondary">Volver</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection