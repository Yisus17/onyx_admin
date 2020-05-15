<div class="card ">
  <div class="card-body">
    <!-- Product -->
    <div class="row mb-2">
      <div class="form-group col-12">
        <label for="product_id"><span class="required-field">*</span>Producto</label>
        <select name="product_id" class="form-control search-select-bar" data-live-search="true">
          <option value="" selected disabled>--Selecciona una opción--</option>
          @foreach($products as $product)
            <option value="{{ $product->id }}">{{ '('.$product->code.') '.$product->description }}</option>
          @endforeach
        </select>
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





