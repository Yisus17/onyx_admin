@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Edit Client for {{auth()->user()->name}}</span>
                </div>

                <div class="card-body">
                    @include('partials.session_message')
                    @include('clients.partials.errors')

                    {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT']) !!}
                        @include('clients.partials.form')
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection