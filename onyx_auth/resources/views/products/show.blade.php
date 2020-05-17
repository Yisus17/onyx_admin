@extends('layouts.app')

@section('content')
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalles del producto</span>
								</div>
								<div class="card-body">
									<table class="table table-bordered">
										<tbody>
											<tr>
												<th>Código</th>
												<td>{{$product->code}}</td>
											</tr>
											<tr>
												<th>Marca</th>
												<td>{{$product->brand}}</td>
											</tr>
											<tr>
												<th>Modelo</th>
												<td>{{$product->model}}</td>
											</tr>
											<tr>
												<th>Descripción</th>
												<td>{{$product->description}}</td>
											</tr>
											<tr>
												<th>Rubro</th>
												<td>{{$product->category->name}}</td>
											</tr>
											<tr>
												<th>Tipo</th>
												<td>{{$product->type}}</td>
											</tr>
											<tr>
												<th>Serial</th>
												<td>{{$product->serial}}</td>
											</tr>
											<tr>
												<th>Precio de compra</th>
												<td>{{$product->purchase_price ? $product->purchase_price.'€' : '' }}</td>
											</tr>
											<tr>
												<th>Estado</th>
												<td>{{$product->status}}</td>
											</tr>
											<tr>
												<th>Comprado por</th>
												<td>{{$product->bought_by}}</td>
											</tr>
											<tr>
												<th>Fecha de compra</th>
												<td>{{$product->purchase_date ? $product->purchase_date->format('d/m/Y') : ''}}</td>
											</tr>
											<tr>
												<th>Años de antigüedad</th>
												<td>{{$product->years_old}}</td>
											</tr>
											<tr>
												<th>Imagen</th>
												<td>
													@if(isset($product) && $product->image_name)
														<input type="image" src="{{url('uploads/products/'.$product->image_name)}}" width="50" height="50">
													@endif
												</td>
											</tr>
											<tr>
												<th>Contable</th>
												<td>{{$product->countable ? 'Si' : 'No'}}</td>
											</tr>
										</tbody>
									</table>
									<a href="{{route('products.edit', $product)}}" class="btn btn-primary">Editar</a>
									<a href="/products" class="btn btn-secondary">Volver</a>
								</div>
            </div>
        </div>
    </div>
</div>
@endsection