@extends('layouts.app')

@section('content')

<div class="container">
    @include('partials.session_message')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Listado de presupuestos</span>
                    <a href="/budgets/create" class="btn btn-primary btn-sm">Nuevo presupuesto</a>
                </div>

                <div class="card-body">      
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Cliente</th>
                              <th scope="col">Fecha de creación</th>
                              <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($budgets as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->client }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <form action="{{ route('budgets.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a este presupuesto?');">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{route('budgets.show', $item->id)}}" class="btn btn-primary btn-sm" title="Mostrar presupuesto"><i class="fas fa-eye" ></i></a>
                                            <a href="{{route('budgets.edit', $item)}}" class="btn btn-success btn-sm" title="Editar presupuesto"><i class="fas fa-edit" ></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar presupuesto"><i class="fa fa-minus-circle" ></i></button>
                                        </form> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$budgets->links()}}  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection