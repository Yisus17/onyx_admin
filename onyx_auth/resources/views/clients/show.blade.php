@extends('layouts.app')

@section('content')
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Client Details</span>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{$client->name}}</h5>
                    <p class="card-text">Address: {{$client->address}}</p>
                    <p class="card-text">Phone: {{$client->phone}}</p>
                    <p class="card-text">Email: {{$client->email}}</p>
                    <a href="{{route('clients.edit', $client)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection