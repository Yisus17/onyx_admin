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
                    <p class="card-text">Código: {{$product->code}}</p>
                    <p class="card-text">Marca: {{$product->brand}}</p>
                    <p class="card-text">Modelo: {{$product->model}}</p>
                    <p class="card-text">Descripción: {{$product->description}}</p>
                    <p class="card-text">Categoría: {{$product->category->name}}</p>
                    <p class="card-text">Tipo: {{$product->type}}</p>
                    <p class="card-text">Serial: {{$product->serial}}</p>
                    <p class="card-text">Precio de compra: {{$product->purchase_price ? $product->purchase_price.'€' : '' }}</p>
                    <p class="card-text">Estado: {{$product->status}}</p>
                    <p class="card-text">Comprado por: {{$product->bought_by}}</p>
                    <p class="card-text">Fecha de compra: {{$product->purchase_date ? $product->purchase_date->format('d/m/Y') : ''}}</p>
                    <p class="card-text">Años de antigüedad: {{$product->years_old}}</p>
                    <p class="card-text">Contable: {{$product->countable ? 'Si' : 'No'}}</p>
                    <a href="{{route('products.edit', $product)}}" class="btn btn-primary">Editar</a>
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Volver</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection