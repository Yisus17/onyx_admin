<!-- Product selection -->
<div class="row mb-3">
    <div class="col-12">
      <hr>
    </div>
    <div class="form-group col-12">
      <label for="product_id">Productos</label>
      <div class="input-group select-add">
        <select id="product-select" class="form-control selectpicker" data-live-search="true">
          <option value="" selected disabled>--Selecciona una opción--</option>
          @foreach($products as $product)
            <option value="{{ $product->id }}">{{ '('.$product->code.') '.$product->description }}</option>
          @endforeach
        </select>
        <div class="input-group-addon input-group-button">
          <button type="button" id="add-invoice-product" class="btn btn-primary disabled">Agregar</button>
        </div>
      </div>
      <small class="form-text text-muted">Busca productos para agregar a la factura</small>
    </div>
  </div>
<!-- End product selection -->

<!-- Invoice items -->
  <div class="row products-container justify-content-center">
    @if(isset($invoice) && isset($invoice->products))
      @foreach($invoice->products as $invoice_product)
        @include('invoices.product', ['product' => $invoice_product, 'uniqid' => Str::random(9)])
      @endforeach
    @endif
  </div>
<!-- End invoice items -->

@section('scripts')
  @parent
  <script type="text/javascript">
    function checkAddBtn(){
      if($("#product-select").val()){
        $("#add-invoice-product").removeClass('disabled');
      }else{
        $("#add-invoice-product").addClass('disabled');
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

    $('#add-invoice-product').click(function(e){
      e.preventDefault();
      var productId = $('#product-select').val();
      if(productId){
        $.ajax({
          type:'POST',
          url:'/invoices/addProduct',
          data:{product_id: productId},
          success:function(response){
            $('.products-container').append(response);
          },
          error:function(jqXHR, textStatus, errorThrown){
            alert('Ha ocurrido un error');
          },
        });
      }
    });

    $('.products-container').on('click', '.delete-product', function(event){
      event.preventDefault();
      $(this).closest('.product-container').remove();
    });
  </script>
@endsection