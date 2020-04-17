@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Edit Product for {{auth()->user()->name}}</span>
                </div>

                <div class="card-body">
                    @if ( session('message') )
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" name="name" placeholder="Name" class="form-control mb-2" value="{{$product->name}}" />
                        <input type="text" name="description" placeholder="Description" class="form-control mb-2" value="{{$product->description}}" />
                        <input type="number" name="price" placeholder="Price" class="form-control mb-2" min="1" step="any" value="{{$product->price}}" />
                        <input type="date" name="bought_at" placeholder="Bought Date" class="form-control mb-2" value="{{$product->bought_at}}" />
                        <button class="btn btn-primary " type="submit">Edit</button>
                        <a href="/products" class="btn btn-secondary">Back</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection