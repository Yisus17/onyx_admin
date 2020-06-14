@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
			<div class="col-md-12">
				<h2>Dashboard</h2>
				<div class="card-deck mt-4">

					<!-- PRODUCTS -->
					<div class="card">
						<div class="image-dashboard-card cyan">
							<i class="fas fa-headphones-alt"></i>
						</div>
						
						<div class="card-body">
							<h5 class="card-title">Productos</h5>
							<p class="card-text">En esta sección podrás gestionar los productos de tu inventario.</p>
							<a href="{{ url('/products') }}" class="btn btn-primary">Ir a productos</a>
						</div>
					</div>

					<!-- CLIENTS -->
					<div class="card">
						<div class="image-dashboard-card yellow">
							<i class="fas fa-user-friends"></i>
						</div>
						
						<div class="card-body">
							<h5 class="card-title">Contactos</h5>
							<p class="card-text">En esta sección podrás gestionar los datos de tus contactos.</p>
							<a href="{{ url('/clients') }}" class="btn btn-primary">Ir a contactos</a>
						</div>
					</div>

					<!-- BUDGETS -->
					<div class="card">
						<div class="image-dashboard-card red">
							<i class="fas fa-hand-holding-usd"></i>
						</div>
						
						<div class="card-body">
							<h5 class="card-title">Presupuestos</h5>
							<p class="card-text">En esta sección podrás crear, editar y descargar tus presupuestos.</p>
							<a href="{{ url('/budgets') }}" class="btn btn-primary">Ir a presupuestos</a>
						</div>
					</div>

					<!-- Invoices -->
					<div class="card">
						<div class="image-dashboard-card green">
							<i class="fas fa-file-invoice-dollar"></i>
						</div>
						
						<div class="card-body">
							<h5 class="card-title">Facturas</h5>
							<p class="card-text">En esta sección podrás crear, editar y descargar tus facturas.</p>
							<a href="{{ url('/invoices') }}" class="btn btn-primary">Ir a facturas</a>
						</div>
					</div>
				
				</div>
			</div>
    </div>
</div>
@endsection