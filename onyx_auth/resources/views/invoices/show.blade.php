@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
      <!-- Breadcrumbs -->
			{{ Breadcrumbs::render('invoices.show', $invoice) }}

      <!-- Session messages -->
      @include('partials.session_message')
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
          <span>Detalles de la factura <b>#{{$invoice->id}}</b></span>
          <a href="{{route('invoices.excelExport', $invoice->id)}}" class="btn btn-success btn-sm float-right">
            <span><i class="fas fa-file-excel mr-1"></i> Descargar excel</span>
          </a>
				</div>
				<div class="card-body">
        
          <!-- Budget data -->
          @include('invoices.partials.show.invoice_data_table')
          <hr>

          <!-- Budget products -->
          <h5>Productos</h5>
          @foreach($invoice->products as $product)
            @include('invoices.partials.show.invoice_products_table', ['product' => $product])
          @endforeach
          
          <a href="{{route('invoices.edit', $invoice)}}" class="btn btn-primary">Editar</a>
          <a href="/invoices" class="btn btn-secondary">Volver</a>
          <a 
            href="{{route('invoices.duplicate', $invoice->id)}}" 
            class="btn btn-primary float-right" 
            onclick="return confirm('¿Estás seguro que deseas duplicar a esta factura?');">
            <span><i class="fas fa-copy mr-1"></i> Duplicar</span>
          </a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection