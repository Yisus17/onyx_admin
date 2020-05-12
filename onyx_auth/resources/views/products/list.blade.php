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
                                <th scope="col">Código</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Description</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Precio de compra</th>
                                <th scope="col">Fecha de compra</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{ $item->code }}</th>
                                <td>{{ $item->model }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->purchase_price }}</td>
                                <td>{{ $item->purchase_date }}</td>
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
            </div>
        </div>
    </div>
</div>
@endsection