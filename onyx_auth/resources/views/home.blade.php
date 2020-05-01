@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Dashboard</h3></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 col-sm-12"><a href="{{ url('/products') }}">
                                <div class="card dashboard-card">
                                    <img src="{{ asset('img/products-card.png') }}" class="card-img-top" alt="Product manager">
                                    <div class="card-body">
                                        <p class="card-text">Click here to manage your products</p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-md-4 col-sm-12"><a href="{{ url('/clients') }}">
                                <div class="card dashboard-card">
                                    <img src="{{ asset('img/clients-card.png') }}" class="card-img-top" alt="Product manager">
                                    <div class="card-body">
                                        <p class="card-text">Click here to manage your clients</p>
                                    </div>
                                </div>
                            </a></div>

                        
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection