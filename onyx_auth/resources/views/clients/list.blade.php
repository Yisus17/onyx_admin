@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Clients for {{auth()->user()->name}}</span>
                    <a href="/clients/create" class="btn btn-primary btn-sm">New Client</a>
    
                </div>

                <div class="card-body">      
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                     <form action="{{ route('clients.destroy',$item->id) }}" method="POST">
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