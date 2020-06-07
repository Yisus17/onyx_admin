@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
      @include('partials.session_message')
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
          <span>Detalles del presupuesto <b>#{{$budget->id}}</b></span>
          <a href="{{route('budgets.excelExport', $budget->id)}}" class="btn btn-success btn-sm float-right">
            <span><i class="fas fa-file-excel mr-1"></i> Descargar excel</span>
          </a>
				</div>
				<div class="card-body">
        
          <!-- Budget data -->
          @include('budgets.partials.show.budget_data_table')
          <hr>

          <!-- Budget products -->
          <h5>Productos</h5>
          @foreach($budget->products as $product)
            @include('budgets.partials.show.budget_products_table', ['product' => $product])
          @endforeach
          
          <a href="{{route('budgets.edit', $budget)}}" class="btn btn-primary">Editar</a>
          <a href="/budgets" class="btn btn-secondary">Volver</a>
          <a 
            href="{{route('budgets.duplicate', $budget->id)}}" 
            class="btn btn-primary float-right" 
            onclick="return confirm('¿Estás seguro que deseas duplicar a este presupuesto?');">
            <span><i class="fas fa-copy mr-1"></i> Duplicar</span>
          </a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection