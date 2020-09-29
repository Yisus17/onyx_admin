@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('budgets') }}

			<!-- Session messages -->
			@include('partials.session_message')

			<!-- Search Bar -->
			<div class="row">
				<div class="input-group col-10">
					<input 
						type="text" 
						class="form-control search-bar" 
						id="search-budget" 
						placeholder="Busca un presupuesto" 
						value="{{isset($querySearch) ? $querySearch : ''}}">
					<div class="input-group-append">
						<button class="btn btn-primary" id="submit-search-budget" type="button">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
				<div class="col-2 clear-search">
					<button class="btn btn-outline-secondary" id="clear-search-budget" type="button">
						Limpiar
					</button>
				</div>
			</div>

			<div class="form-group guide-info col-10">
				<span>*Campos de búsqueda</span>
			</div>

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Listado de presupuestos</span>
					<a href="/budgets/create" class="btn btn-primary btn-sm">Nuevo presupuesto</a>
				</div>

				<div class="card-body">
					@include('partials.loader')  
					<div id="budget-list-container">
						@include('budgets.partials.results')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function sendSearchBudget() {
		let keyword = $('#search-budget').val();
		$("#budget-list-container").html("");
		$(".loader-center").removeClass("hidden");

		$.ajax({
			type: "GET",
			url: "{{route('budgets.search')}}",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				keyword: keyword
			}
		}).done(function(data) {
			$(".loader-center").addClass("hidden");
			$("#budget-list-container").html(data);
		});
	}


	$("#search-budget").keypress(function(e) {
		let key = e.which;
		if (key == 13) { // the enter key code
			sendSearchBudget();
		}
	});

	$("#submit-search-budget").click(function() {
		sendSearchBudget();
	});

	$("#clear-search-budget").click(function() {
		$('#search-budget').val('');
		sendSearchBudget();
	});
</script>
@endsection