
  <input type="text" name="name" placeholder="Name" class="form-control mb-2" value="{{isset($product) ? $product->name : old('name')}}" />
  <input type="text" name="description" placeholder="Description" class="form-control mb-2" value="{{isset($product) ? $product->description : old('description')}}"/>
  <select name="category_id" class="form-control mb-2">
    <option value="" selected disabled>Category</option>
    @foreach($categories as $category)
      <option value="{{ $category->id }}" {{ isset($product) && ($category->id == $product->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
    @endforeach
  </select>
  <input type="number" name="price" placeholder="Price" class="form-control mb-2" min="1" value="{{isset($product) ? $product->price : old('price')}}" />
  <input type="date" name="bought_at" placeholder="Bought Date" class="form-control mb-2" value="{{isset($product) ? $product->bought_at : old('bought_at')}}"/>
  <button class="btn btn-primary " type="submit">Create</button>
  <a href="/products" class="btn btn-secondary">Back</a>


