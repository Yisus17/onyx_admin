@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Editar producto por: {{auth()->user()->name}}</span>
                </div>

                <div class="card-body">
                    @include('partials.session_message')
                    @include('partials.errors')

                    {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT', 'id' => 'product_form']) !!}
                        @include('products.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection