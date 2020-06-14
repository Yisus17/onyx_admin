@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('invoices') }}

			<!-- Session messages -->
			@include('partials.session_message')

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Listado de facturas</span>
					<a href="/invoices/create" class="btn btn-primary btn-sm">Nueva factura</a>
				</div>

				<div class="card-body">      
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Contacto</th>
								<th scope="col">Fecha de creación</th>
								<th scope="col">Descripción</th>
								<th scope="col">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($invoices as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>{{ $item->client->name }}</td>
									<td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:m') : ''}}</td>
									<td>{{ truncateText($item->description, 20) }}</td>
									<td>
										<form action="{{ route('invoices.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a esta factura?');">
											@method('DELETE')
											@csrf
											<a href="{{route('invoices.show', $item->id)}}" class="btn btn-primary btn-sm" title="Mostrar factura"><i class="fas fa-eye" ></i></a>
											<a href="{{route('invoices.edit', $item)}}" class="btn btn-success btn-sm" title="Editar factura"><i class="fas fa-edit" ></i></a>
											<a href="{{route('invoices.excelExport', $item->id)}}" class="btn btn-success btn-sm" title="Descargar excel"><i class="fas fa-file-excel"></i></a>
											<a href="{{route('invoices.duplicate', $item->id)}}" class="btn btn-primary btn-sm" title="Duplicar factura" onclick="return confirm('¿Estás seguro que deseas duplicar a esta factura?');"><i class="fas fa-copy"></i></a>
											<button type="submit" class="btn btn-danger btn-sm" title="Eliminar factura"><i class="fa fa-minus-circle" ></i></button>
										</form> 
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$invoices->links()}}  
				</div>
			</div>
		</div>
	</div>
</div>
@endsection