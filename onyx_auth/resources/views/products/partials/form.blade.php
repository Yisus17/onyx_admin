<div class="custom-form">
  <div class="form-group required-info">
    <span>*Campos obligatorios</span>
  </div>

  <div class="form-group">
    <label for="code"><span class="required-field">*</span>Código</label>
    <input type="text" name="code" class="form-control" value="{{isset($product) ? $product->code : old('code')}}" />
  </div>

  <div class="form-group">
    <label for="brand"><span class="required-field">*</span>Marca</label>
    <input type="text" name="brand" class="form-control" value="{{isset($product) ? $product->brand : old('brand')}}" />
  </div>

  <div class="form-group">
    <label for="model"><span class="required-field">*</span>Modelo</label>
    <input type="text" name="model" class="form-control" value="{{isset($product) ? $product->model : old('model')}}" />
  </div>

  <div class="form-group">
    <label for="description"><span class="required-field">*</span>Descripción</label>
    <input type="text" name="description" class="form-control" value="{{isset($product) ? $product->description : old('description')}}"/>
  </div>

  <div class="form-group">
    <label for="category_id"><span class="required-field">*</span>Rubro</label>
    <select name="category_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ (isset($product) && $category->id == $product->category_id) || old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="type"><span class="required-field">*</span>Tipo</label>
    <input type="text" name="type" class="form-control" value="{{isset($product) ? $product->type : old('type')}}"/>
  </div>

  <div class="form-group">
    <label for="serial">Serial</label>
    <input type="text" name="serial" class="form-control" value="{{isset($product) ? $product->serial : old('serial')}}"/>
  </div>

  <div class="form-group">
    <label for="purchase_price"><span class="required-field">*</span>Precio de compra</label>
    <div class="input-group">
      <input type="number" name="purchase_price" class="form-control" min="0" step="0.01" value="{{isset($product) ? $product->purchase_price : old('purchase_price')}}" />
      <div class="input-group-append">
        <span class="input-group-text">€</span>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="status"><span class="required-field">*</span>Estado</label>
    <input type="text" name="status" class="form-control" value="{{isset($product) ? $product->status : old('status')}}"/>
  </div>

  <div class="form-group">
    <label for="bought_by"><span class="required-field">*</span>Comprado por</label>
    <input type="text" name="bought_by" class="form-control" value="{{isset($product) ? $product->bought_by : old('bought_by')}}"/>
  </div>

  <div class="form-group">
    <label for="purchase_date">Fecha de compra</label>
    <input type="text" id="purchase_date" name="purchase_date" class="form-control datepicker" autocomplete="off"/>
  </div>

  <div class="form-group">
    <label for="years_old"><span class="required-field">*</span>Años de antigüedad</label>
    <input type="number" name="years_old" class="form-control" min="0" step="1" value="{{isset($product) ? $product->years_old : old('years_old')}}" readonly/>
  </div>

  <div class="form-group">
    <label>Imagen</label>

    <div class="input-group mb-1">
      <div class="input-group-prepend">
        <label class="btn btn-outline-secondary">
          Buscar <input id="product_image" placeholder="Selecciona un archivo" type="file" name="image" hidden>
        </label>
        
      </div>
      <input 
        id="product_image_name" 
        type="text" 
        class="form-control" 
        placeholder="Selecciona un archivo"
        value="{{isset($product) && $product->image_original_name ? $product->image_original_name : ''}}" 
        readonly>
      <div class="input-group-append">
        <label id="reset_product_image" class="btn btn-outline-secondary">Eliminar</label>
      </div>
    </div>

    <div class="image-area">
      <p id="no_image_message" class="{{isset($product) && $product->image_name ? 'hidden' : ''}}">No hay imagen seleccionada</p>
      <input 
        type="image" 
        class="{{isset($product) && $product->image_name ? '' : 'hidden'}}" 
        id="preview_product_image" src="{{isset($product) && $product->image_name ? url('uploads/products/'.$product->image_name) : ''}}">
    </div>
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
  @if(isset($product) && $product->purchase_date)
    <script>
      var purchaseDate = moment('{{$product->purchase_date}}', 'YYYY-MM-DD').format('DD/MM/YYYY');
      $('#purchase_date').datepicker('setDate', purchaseDate);
    </script>
  @elseif(old('purchase_date'))
    <script>
      var purchaseDate = '{{old("purchase_date")}}';
      $('#purchase_date').datepicker('setDate', purchaseDate);
    </script>
  @endif

  <script>

    $('#purchase_date').on("change", function(e) {
      var selectedDate = moment(e.target.value, 'DD/MM/YYYY');
      var yearsOfDiff = moment().diff(selectedDate, 'year');
      if (yearsOfDiff < 0){
        yearsOfDiff = 0;
      }
      $('input[name ="years_old"]').val(yearsOfDiff);
    });



    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#preview_product_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        $('#preview_product_image').removeClass('hidden');
        $('#no_image_message').addClass('hidden');
      }
    }

    $('#product_image').on('change',function(){
      readURL(this);
      var fileName = $(this).val().split('\\').pop();
      $('#product_image_name').val(fileName);
    })

    $('#reset_product_image').on('click',function(){
      $('#product_image').val('');
      $('#product_image_name').val('');
      $('#preview_product_image').addClass('hidden');
      $('#no_image_message').removeClass('hidden');
    })
</script>

@endsection




