<div  class="col-12 mb-2 budget-product-container">
  <div id="budget-product-{{$uniqid}}" class="card budget-product">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>{{$product->code}}</span>
      <button 
        type="button" 
        class="btn btn-danger btn-sm rounded-circle delete-budget-product">
          <i class="fa fa-times"></i>
      </button>
    </div>
    <div class="card-body">
      <!-- Product -->
      <input type="text" name="products[{{$uniqid}}][id]" value="{{$product->id}}" hidden/>
      <div class="row mb-2">
        <div class="form-group col-12">
          <label for="description"><span class="required-field">*</span>Descripción</label>
          <input type="text" name="products[{{$uniqid}}][description]" class="form-control" value="{{$product->description}}"/>
        </div>
      </div>
      <!-- End product -->

      <!-- Product numbers -->
      <div class="row">
        <div class="form-group col-md-6 col-lg-3">
          <label for="quantity"><span class="required-field">*</span>Cantidad</label>
          <input type="number" name="products[{{$uniqid}}][quantity]" min="1" class="form-control" value=""/>
        </div>

        <div class="form-group col-md-6 col-lg-3">
          <label for="factor"><span class="required-field">*</span>Factor</label>
          <input type="number" name="products[{{$uniqid}}][factor]" min="0" class="form-control" value=""/>
        </div>

        <div class="form-group col-md-6 col-lg-3">
          <label for="product_discount"><span class="required-field">*</span>Precio unitario</label>
          <div class="input-group">
            <input type="text" name="products[{{$uniqid}}][unit_price]" class="form-control" value="{{$product->unit_price}}"/>
            <div class="input-group-append">
              <span class="input-group-text">€</span>
            </div>
          </div>
        </div>

        <div class="form-group col-md-6 col-lg-3">
          <label for="product_discount">Descuento</label>
          <div class="input-group">
            <input type="number" name="products[{{$uniqid}}][discount]" class="form-control" min="0" max="100" step="1" value="" />
            <div class="input-group-append">
              <span class="input-group-text">%</span>
            </div>
          </div>
        </div>
      </div>
      <!-- End product numbers -->
    </div>
  </div>
</div>



