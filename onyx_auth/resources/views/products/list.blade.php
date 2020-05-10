@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Products for {{auth()->user()->name}}</span>
                    <a href="/products/create" class="btn btn-primary btn-sm">New Product</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Bought Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->bought_at }}</td>
                                <td>
                                    <form action="{{ route('products.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{route('products.show', $item->id)}}" class="btn btn-primary btn-sm" title="Edit item"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('products.edit', $item)}}" class="btn btn-success btn-sm" title="Edit item"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete item"><i class="fa fa-minus-circle"></i></button>
                                    </form>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
                <a href="{{route('products.pdf')}}" class="btn btn-success btn-sm" title="Export"><i class="fas fa-file-excel"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection