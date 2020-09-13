@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('products') }}

			<!-- Session messages -->
			@include('partials.session_message')

			<!-- Search Bar -->
			<div class="row">
				<div class="input-group col-10">
					<input 
						type="text" 
						class="form-control search-bar" 
						id="search-product" 
						placeholder="Busca un producto" 
						value="{{isset($querySearch) ? $querySearch : ''}}">
					<div class="input-group-append">
						<button class="btn btn-primary" id="submit-search-product" type="button">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
				<div class="col-2 clear-search">
					<button class="btn btn-outline-secondary" id="clear-search-product" type="button">
						Limpiar
					</button>
				</div>
			</div>

			<div class="form-group guide-info col-10">
				<span>*Campos de búsqueda</span>
			</div>

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Listado de productos</span>
					<a href="/products/create" class="btn btn-primary btn-sm">Nuevo producto</a>
				</div>

				<div class="card-body">
					<div id="product-list-container">
						@include('products.partials.results')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function sendSearchProduct() {
		let keyword = $('#search-product').val();

		$.ajax({
			type: "GET",
			url: "{{route('products.search')}}",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				keyword: keyword
			}
		}).done(function(data) {
			$("#product-list-container").html(data);
		});
	}


	$("#search-product").keypress(function(e) {
		let key = e.which;
		if (key == 13) { // the enter key code
			sendSearchProduct();
		}
	});

	$("#submit-search-product").click(function() {
		sendSearchProduct();
	});

	$("#clear-search-product").click(function() {
		$('#search-product').val('');
		sendSearchProduct();
	});
</script>
@endsection