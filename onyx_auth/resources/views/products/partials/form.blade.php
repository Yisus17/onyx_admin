<div class="custom-form">
  <div class="form-group">
    <label for="code">Código</label>
    <input type="text" name="code" class="form-control" value="{{isset($product) ? $product->code : old('code')}}" />
  </div>

  <div class="form-group">
    <label for="brand">Marca</label>
    <input type="text" name="brand" class="form-control" value="{{isset($product) ? $product->brand : old('brand')}}" />
  </div>

  <div class="form-group">
    <label for="model">Modelo</label>
    <input type="text" name="model" class="form-control" value="{{isset($product) ? $product->model : old('model')}}" />
  </div>

  <div class="form-group">
    <label for="description">Descripción</label>
    <input type="text" name="description" class="form-control" value="{{isset($product) ? $product->description : old('description')}}"/>
  </div>

  <div class="form-group">
    <label for="category_id">Categoría</label>
    <select name="category_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ isset($product) && ($category->id == $product->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="type">Tipo</label>
    <input type="text" name="type" class="form-control" value="{{isset($product) ? $product->type : old('type')}}"/>
  </div>

  <div class="form-group">
    <label for="serial">Serial</label>
    <input type="text" name="serial" class="form-control" value="{{isset($product) ? $product->serial : old('serial')}}"/>
  </div>

  <div class="form-group">
    <label for="purchase_price">Precio de compra</label>
    <div class="input-group">
      <input type="number" name="purchase_price" class="form-control" min="0" step="0.01" value="{{isset($product) ? $product->purchase_price : old('purchase_price')}}" />
      <div class="input-group-append">
        <span class="input-group-text">€</span>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="status">Estado</label>
    <input type="text" name="status" class="form-control" value="{{isset($product) ? $product->status : old('status')}}"/>
  </div>

  <div class="form-group">
    <label for="bought_by">Comprado por</label>
    <input type="text" name="bought_by" class="form-control" value="{{isset($product) ? $product->bought_by : old('bought_by')}}"/>
  </div>

  <div class="form-group">
    <label for="purchase_date">Fecha de compra</label>
    <input type="text" name="purchase_date" class="form-control datepicker" value="{{isset($product) ? $product->purchase_date : old('purchase_date')}}"/>
  </div>

  <div class="form-group">
    <label for="years_old">Años de antigüedad</label>
    <input type="number" name="years_old" class="form-control" min="0" step="1" value="{{isset($product) ? $product->years_old : old('years_old')}}" />
  </div>

  <div class="form-group form-check">
    <input type="checkbox" name="countable" class="form-check-input" {{isset($product) && $product->countable ? 'checked="checked"' : ''}}>
    <label class="form-check-label" for="countable">Marcar si este producto es contable</label>
  </div>

  <div class="form-group">
    <button class="btn btn-primary " type="submit">Guardar</button>
    <a href="/products" class="btn btn-secondary">Volver</a>
  </div>
</div>

@section('scripts')
<script>
  $('.datepicker').datepicker({
    format: {
      toDisplay: function (date, format, language) {
          var dateMoment = moment(date, 'YYYY-MM-DD')
          return dateMoment.format('DD-MM-YYYY');
      },
      toValue: function (date, format, language) {
        console.log(date);
        var dateMoment = moment(date, 'DD-MM-YYYY')
        return dateMoment.format('YYYY-MM-DD');
      }
    }
  });
</script>

@endsection




