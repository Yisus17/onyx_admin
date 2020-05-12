@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Create Product for {{auth()->user()->name}}</span>
                </div>

                <div class="card-body">
                    @include('partials.session_message')
                    @include('partials.errors')

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

                    {!! Form::open(['route' => 'products.store']) !!}
                        @include('products.partials.form')
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

