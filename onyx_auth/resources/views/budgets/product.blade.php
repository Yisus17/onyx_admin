<div class="col-12 mb-2 budget-product">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>{{$product->code}}</span>
      <button 
        type="buttom" 
        class="btn btn-danger btn-sm rounded-circle delete-budget-product">
        <i class="fa fa-times"></i>
      </button>
    </div>
    <div class="card-body">
      <!-- Product -->
      <div class="row">
        <div class="form-group col-12">
          <h5>
            {{$product->description}}
          </h5>
        </div>
      </div>
      <!-- End product -->

      <!-- Product numbers -->
      <div class="row">
        <div class="form-group col-4">
          <label for="quantity"><span class="required-field">*</span>Cantidad</label>
          <input type="number" name="quantity" min="1" step="1" class="form-control" value="{{old('status')}}"/>
        </div>

        <div class="form-group col-4">
          <label for="product_discount">Precio unitario</label>
          <div class="input-group">
            <input type="text" class="form-control" value="{{$product->purchase_price}}" readonly/>
            <div class="input-group-append">
              <span class="input-group-text">€</span>
            </div>
          </div>
        </div>

        <div class="form-group col-4">
          <label for="product_discount">Descuento</label>
          <div class="input-group">
            <input type="number" name="product_discount" class="form-control" min="0" max="100" step="1" value="{{old('product_discount')}}" />
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



