@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Listado de clientes</span>
                    <a href="/clients/create" class="btn btn-primary btn-sm">Nuevo cliente</a>
                </div>

                <div class="card-body">      
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <form action="{{ route('clients.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a este cliente?');">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{route('clients.show', $item->id)}}" class="btn btn-primary btn-sm" title="Edit item"><i class="fas fa-eye" ></i></a>
                                            <a href="{{route('clients.edit', $item)}}" class="btn btn-success btn-sm" title="Edit item"><i class="fas fa-edit" ></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete item"><i class="fa fa-minus-circle" ></i></button>
                                        </form> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$clients->links()}}  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection