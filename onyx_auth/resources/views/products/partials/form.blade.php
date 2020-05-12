<div class="custom-form">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" value="{{isset($product) ? $product->name : old('name')}}" />
  </div>
  
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control" value="{{isset($product) ? $product->description : old('description')}}"/>
  </div>

  <div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ isset($product) && ($category->id == $product->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" class="form-control" min="0" step="0.01" value="{{isset($product) ? $product->price : old('price')}}" />
  </div>

  <div class="form-group">
    <label for="bought_at">Bought Date</label>
    <input type="date" name="bought_at" placeholder="Bought Date" class="form-control" value="{{isset($product) ? $product->bought_at : old('bought_at')}}"/>
  </div>

  <div class="form-group">
    <button class="btn btn-primary " type="submit">Guardar</button>
    <a href="/products" class="btn btn-secondary">Volver</a>
  </div>
</div>




