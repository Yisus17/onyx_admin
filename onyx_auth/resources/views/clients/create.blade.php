@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Create new Client</span>
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

                    <form method="POST" action="/clients">
                        @csrf
                        <input type="text" name="name" placeholder="Name" class="form-control mb-2" value="{{old('name')}}" />
                        <input type="text" name="address" placeholder="Address" class="form-control mb-2" value="{{old('address')}}"/>
                        <input type="text" name="phone" placeholder="Phone" class="form-control mb-2" min="1" value="{{old('phone')}}" />
                        <input type="email" name="email" placeholder="Email" class="form-control mb-2" value="{{old('email')}}"/>
                        <button class="btn btn-primary " type="submit">Create</button>
                        <a href="/clients" class="btn btn-secondary">Back</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection