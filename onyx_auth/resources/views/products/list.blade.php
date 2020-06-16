@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('products') }}

			<!-- Session messages -->
			@include('partials.session_message')

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Listado de productos</span>
					<a href="/products/create" class="btn btn-primary btn-sm">Nuevo producto</a>
				</div>

				<div class="card-body">
					<div class="table-responsive"> 	
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Código</th>
									<th scope="col">Modelo</th>
									<th scope="col">Descripción</th>
									<th scope="col">Rubro</th>
									<th scope="col">Precio de compra</th>
									<th scope="col">Fecha de compra</th>
									<th scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($products as $item)
									<tr>
										<th scope="row">{{ $item->code }}</th>
										<td>{{ $item->model }}</td>
										<td>{{ $item->description }}</td>
										<td>{{ $item->category->name }}</td>
										<td>{{ $item->purchase_price ? $item->purchase_price.'€' : ''  }}</td>
										<td>{{ $item->purchase_date ? $item->purchase_date->format('d/m/Y') : ''}}</td>
										<td>
												<form action="{{ route('products.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a este producto?');">
														@method('DELETE')
														@csrf
														<a href="{{route('products.show', $item->id)}}" class="btn btn-primary btn-sm" title="Edit item"><i class="fas fa-eye"></i></a>
														<a href="{{route('products.edit', $item)}}" class="btn btn-success btn-sm" title="Edit item"><i class="fas fa-edit"></i></a>
														<button type="submit" class="btn btn-danger btn-sm" title="Delete item"><i class="fa fa-minus-circle"></i></button>
												</form>

										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					{{$products->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection