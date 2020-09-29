@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('clients') }}

			<!-- Session messages -->
			@include('partials.session_message')

				<!-- Search Bar -->
				<div class="row">
					<div class="input-group col-10">
						<input 
							type="text" 
							class="form-control search-bar" 
							id="search-client" 
							placeholder="Busca un contacto" 
							value="{{isset($querySearch) ? $querySearch : ''}}">
						<div class="input-group-append">
							<button class="btn btn-primary" id="submit-search-client" type="button">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
					<div class="col-2 clear-search">
						<button class="btn btn-outline-secondary" id="clear-search-client" type="button">
							Limpiar
						</button>
					</div>
				</div>
				
				<div class="form-group guide-info col-10">
					<span>*Campos de búsqueda</span>
				</div>

				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
							<span>Listado de contactos</span>
							<a href="/clients/create" class="btn btn-primary btn-sm">Nuevo contacto</a>
					</div>

					<div class="card-body"> 
						@include('partials.loader')   
						<div id="client-list-container">
							@include('clients.partials.results')
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function sendSearchClient() {
		let keyword = $("#search-client").val();
		$("#client-list-container").html("");
		$(".loader-center").removeClass("hidden");

		$.ajax({
			type: "GET",
			url: "{{route('clients.search')}}",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				keyword: keyword
			}
		}).done(function(data) {
			$(".loader-center").addClass("hidden");
			$("#client-list-container").html(data);
		});
	}


	$("#search-client").keypress(function(e) {
		let key = e.which;
		if (key == 13) { // the enter key code
			sendSearchClient();
		}
	});

	$("#submit-search-client").click(function() {
		sendSearchClient();
	});

	$("#clear-search-client").click(function() {
		$('#search-client').val('');
		sendSearchClient();
	});
</script>
@endsection