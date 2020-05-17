@extends('layouts.app')

@section('content')
<div class="container">
  @include('partials.session_message')
  <div class="row justify-content-center">
    <div class="col-10 custom-form">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Crear presupuesto por: {{auth()->user()->name}}</span>
        </div>

        <div class="card-body">
          {!! Form::open(['route' => 'budgets.store']) !!}
            <div class="row mb-2">
              <!-- Budget data -->
                @include('budgets.partials.budget_data_form')
              <!-- End budget data -->
            </div>

            <!-- Product selection -->
            <div class="row mb-3">
              <div class="col-12">
                <hr>
              </div>
              <div class="form-group col-12">
                <label for="product_id"><span class="required-field">*</span>Productos</label>
                <div class="input-group select-add">
                  <select id="product-select" class="form-control selectpicker" data-live-search="true">
                    <option value="" selected disabled>--Selecciona una opción--</option>
                    @foreach($products as $product)
                      <option value="{{ $product->id }}">{{ '('.$product->code.') '.$product->description }}</option>
                    @endforeach
                  </select>
                  <div class="input-group-addon input-group-button">
                    <button type="button" id="add-budget-product" class="btn btn-primary disabled">Agregar</button>
                  </div>
                </div>
                <small class="form-text text-muted">Busca productos para agregar al presupuesto</small>
              </div>
            </div>
            <!-- End product selection -->

            <!-- Budget items -->
            <div class="row budget-products-container justify-content-center">
            </div>
            <!-- End budget items -->

            
            <div class="row">
              <div class="form-group col-12">
                <button class="btn btn-primary " type="submit">Guardar</button>
                <a href="/budgets" class="btn btn-secondary">Volver</a>
              </div>
            </div>
          {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
    function checkAddBtn(){
      if($("#product-select").val()){
        $("#add-budget-product").removeClass('disabled');
      }else{
        $("#add-budget-product").addClass('disabled');
      }
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#product-select').change(function(e){
      checkAddBtn();
    });

    $('#add-budget-product').click(function(e){
      e.preventDefault();
      var productId = $('#product-select').val();
      if(productId){
        $.ajax({
          type:'POST',
          url:'/budgets/addProduct',
          data:{product_id: productId},
          success:function(response){
            var uniqueId = $(response).find('.budget-product').attr('id');
            $('.budget-products-container').append(response);
            $('#'+uniqueId+" .delete-budget-product").on('click',function(event){
              event.preventDefault();
              $(this).closest('.budget-product-container').remove();
            });
          },
          error:function(jqXHR, textStatus, errorThrown){
            alert('Ha ocurrido un error');
          },
        });
      }
    });
  </script>
@endsection