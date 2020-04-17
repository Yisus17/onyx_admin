@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('/products') }}">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/product-card.jpg') }}" class="card-img-top" alt="Product manager">
                        <div class="card-body">
                            <p class="card-text">Click here to manage your products</p>
                        </div>
                    </div>
                    </a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
