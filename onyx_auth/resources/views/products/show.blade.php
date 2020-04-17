@extends('layouts.app')

@section('content')
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Product Details</span>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">Description: {{$product->description}}</p>
                    <p class="card-text">Price: {{$product->price}}</p>
                    <p class="card-text">Bought Date: {{$product->bought_at}}</p>
                    <a href="{{route('products.edit', $product)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection