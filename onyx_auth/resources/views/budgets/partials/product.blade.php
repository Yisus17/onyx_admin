<div class="card ">
  <div class="card-body">
    <!-- Product -->
    <!-- End product -->

    <!-- Product numbers -->
    <div class="row">
      <div class="form-group col-4">
        <label for="quantity"><span class="required-field">*</span>Cantidad</label>
        <input type="number" name="quantity" min="1" step="1" class="form-control" value="{{old('status')}}"/>
      </div>

      <div class="form-group col-4">
        <label for="product_discount">Precio unitario</label>
        <input type="text" class="form-control" readonly/>
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





