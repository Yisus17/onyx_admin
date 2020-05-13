<div class="custom-form">
  <div class="form-group">
    <label for="name">Nombre (Razón Social)</label>
    <input type="text" name="name" class="form-control" value="{{isset($client) ? $client->name : old('name')}}" />
  </div>

  <div class="form-group">
    <label for="name">Dirección</label>
    <input type="text" name="address" class="form-control" value="{{isset($client) ? $client->address : old('address')}}" />
  </div>

  <div class="form-group">
    <label for="phone">Teléfono</label>
    <input type="text" name="phone" class="form-control" value="{{isset($client) ? $client->phone : old('phone')}}" />
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control" value="{{isset($client) ? $client->email : old('email')}}" />
  </div>

  <div class="form-group">
    <button class="btn btn-primary " type="submit">Guardar</button>
    <a href="/clients" class="btn btn-secondary">Volver</a>
  </div>
</div>