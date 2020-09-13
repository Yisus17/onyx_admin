@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('invoices') }}

			<!-- Session messages -->
			@include('partials.session_message')

			<!-- Search Bar -->
			<div class="row">
				<div class="input-group col-10">
					<input 
						type="text" 
						class="form-control search-bar" 
						id="search-invoice" 
						placeholder="Busca una factura" 
						value="{{isset($querySearch) ? $querySearch : ''}}">
					<div class="input-group-append">
						<button class="btn btn-primary" id="submit-search-invoice" type="button">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
				<div class="col-2 clear-search">
					<button class="btn btn-outline-secondary" id="clear-search-invoice" type="button">
						Limpiar
					</button>
				</div>
			</div>

			<div class="form-group guide-info col-10">
				<span>*Campos de búsqueda</span>
			</div>

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Listado de facturas</span>
					<a href="/invoices/create" class="btn btn-primary btn-sm">Nueva factura</a>
				</div>

				<div class="card-body">   
					<div id="invoice-list-container">
						@include('invoices.partials.results')
					</div>   
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function sendSearchInvoice() {
		let keyword = $('#search-invoice').val();

		$.ajax({
			type: "GET",
			url: "{{route('invoices.search')}}",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				keyword: keyword
			}
		}).done(function(data) {
			$("#invoice-list-container").html(data);
		});
	}


	$("#search-invoice").keypress(function(e) {
		let key = e.which;
		if (key == 13) { // the enter key code
			sendSearchInvoice();
		}
	});

	$("#submit-search-invoice").click(function() {
		sendSearchInvoice();
	});

	$("#clear-search-invoice").click(function() {
		$('#search-invoice').val('');
		sendSearchInvoice();
	});
</script>
@endsection