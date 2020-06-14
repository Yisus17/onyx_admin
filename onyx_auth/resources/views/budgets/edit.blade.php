@extends('layouts.app')

@section('content')
<div class="container">
  @include('partials.session_message')
  <div class="row justify-content-center">
    <div class="col-10 custom-form">
      <!-- Breadcrumbs -->
      {{ Breadcrumbs::render('budgets.edit', $budget) }}

      <!-- Session messages -->
      @include('partials.session_message')

      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Editar presupuesto por: {{auth()->user()->name}}</span>
        </div>

        <div class="card-body">
          {!! Form::model($budget, ['route' => ['budgets.update', $budget->id], 'method' => 'PUT']) !!}
            @include('budgets.partials.form')
          {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection