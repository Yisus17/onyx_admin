@extends('layouts.app')

@section('content')
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalles del cliente</span>
                </div>

                <div class="card-body">
                    <p class="card-text">Nombre (Razón social): {{$client->name}}</p>
                    <p class="card-text">Dirección: {{$client->address}}</p>
                    <p class="card-text">Teléfono: {{$client->phone}}</p>
                    <p class="card-text">Email: {{$client->email}}</p>
                    <a href="{{route('clients.edit', $client)}}" class="btn btn-primary">Editar</a>
                    <a href="/clients" class="btn btn-secondary">Volver</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection