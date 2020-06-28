<?php
// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
  $trail->push('Dashboard', route('dashboard'));
});

/********* CONTACTOS ***********/ 

// Dashboard > Contactos
Breadcrumbs::for('clients', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Contactos', route('clients.index'));
});

// Dashboard > Contactos > Crear contacto
Breadcrumbs::for('clients.create', function ($trail) {
  $trail->parent('clients');
  $trail->push('Crear contacto', route('clients.create'));
});

// Dashboard > Facturas > Mostrar factura
Breadcrumbs::for('clients.show', function ($trail, $item) {
  $trail->parent('clients');
  $trail->push($item->business_name , route('clients.show', $item->id));
});

// Dashboard > Facturas > Editar factura
Breadcrumbs::for('clients.edit', function ($trail, $item) {
  $trail->parent('clients');
  $trail->push('Editar contacto', route('clients.edit', $item->id));
});

/********* PRODUCTOS ***********/ 

// Dashboard > Productos
Breadcrumbs::for('products', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Productos', route('products.index'));
});

// Dashboard > Presupuestos > Crear producto
Breadcrumbs::for('products.create', function ($trail) {
  $trail->parent('products');
  $trail->push('Crear producto', route('products.create'));
});

// Dashboard > Presupuestos > Mostrar producto
Breadcrumbs::for('products.show', function ($trail, $item) {
  $trail->parent('products');
  $trail->push('Producto '.$item->code , route('products.show', $item->id));
});

// Dashboard > Presupuestos > Editar producto
Breadcrumbs::for('products.edit', function ($trail, $item) {
  $trail->parent('products');
  $trail->push('Editar producto', route('products.edit', $item->id));
});


/********* PRESUPUESTOS ***********/ 

// Dashboard > Presupuestos
Breadcrumbs::for('budgets', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Presupuestos', route('budgets.index'));
});

// Dashboard > Presupuestos > Crear presupuesto
Breadcrumbs::for('budgets.create', function ($trail) {
  $trail->parent('budgets');
  $trail->push('Crear presupuesto', route('budgets.create'));
});

// Dashboard > Presupuestos > Mostrar presupuesto
Breadcrumbs::for('budgets.show', function ($trail, $item) {
  $trail->parent('budgets');
  $trail->push('Presupuesto #'.$item->id , route('budgets.show',$item->id));
});

// Dashboard > Presupuestos > Editar presupuesto
Breadcrumbs::for('budgets.edit', function ($trail, $item) {
  $trail->parent('budgets');
  $trail->push('Editar presupuesto #'. $item->id, route('budgets.edit', $item->id));
});

/********* FACTURAS ***********/ 

// Dashboard > Facturas
Breadcrumbs::for('invoices', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Facturas', route('invoices.index'));
});

// Dashboard > Facturas > Crear factura
Breadcrumbs::for('invoices.create', function ($trail) {
  $trail->parent('invoices');
  $trail->push('Crear factura', route('invoices.create'));
});

// Dashboard > Facturas > Mostrar factura
Breadcrumbs::for('invoices.show', function ($trail, $item) {
  $trail->parent('invoices');
  $trail->push('Factura #'.$item->id , route('invoices.show',$item->id));
});

// Dashboard > Facturas > Editar factura
Breadcrumbs::for('invoices.edit', function ($trail, $item) {
  $trail->parent('invoices');
  $trail->push('Editar factura #'. $item->id, route('invoices.edit', $item->id));
});