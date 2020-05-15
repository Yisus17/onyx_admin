@extends('layouts.app')

<!-- Template budget item -->
  <div id="template-budget-item" class="hidden">
    @include('budgets.partials.product')
  </div>
<!-- End template budget item -->

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 custom-form">

      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Crear presupuesto por: {{auth()->user()->name}}</span>
          <a href="#" id="add-budget-item" class="btn btn-primary btn-sm">Agregar item</a>
        </div>

        <div class="card-body">
          <!-- Budget items -->
          <div class="row budget-items-container justify-content-center">
          </div>
          <!-- End budget items -->

          <!-- Budget data -->
          <div class="row budget-date-container">
          </div>
          <!-- End budget data -->
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script>
    var i = 0;
    $('#add-budget-item').click(function(e){
      e.preventDefault();
      i = i+1;
      var templateBudgetItem = $("#template-budget-item").html();
      $('.budget-items-container').append('<div class="budget-item m-2" id ="budget-item-'+i+'">'+templateBudgetItem+'</div>');
      $('#budget-item-'+i+' .search-select-bar').selectpicker();
    });
  </script>
@endsection