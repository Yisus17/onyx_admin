<div class="custom-form">
  <div class="form-group required-info">
    <span>*Campos obligatorios</span>
  </div>
  
  <div class="form-group">
    <label for="name"><span class="required-field">*</span>Nombre (Razón Social)</label>
    <input type="text" name="name" class="form-control" value="{{isset($client) ? $client->name : old('name')}}" />
  </div>

  <div class="form-group">
    <label for="name"><span class="required-field">*</span>Dirección</label>
    <input type="text" name="address" class="form-control" value="{{isset($client) ? $client->address : old('address')}}" />
  </div>

  <div class="form-group">
    <label for="phone"><span class="required-field">*</span>Teléfono</label>
    <input type="text" name="phone" class="form-control" value="{{isset($client) ? $client->phone : old('phone')}}" />
  </div>

  <div class="form-group">
    <label for="secondary_phone">Teléfono secundario</label>
    <input type="text" name="secondary_phone" class="form-control" value="{{isset($client) ? $client->secondary_phone : old('secondary_phone')}}" />
  </div>

  <div class="form-group">
    <label for="email"><span class="required-field">*</span>Email</label>
    <input type="text" name="email" class="form-control" value="{{isset($client) ? $client->email : old('email')}}" />
  </div>

  <div class="form-group">
    <button class="btn btn-primary " type="submit">Guardar</button>
    <a href="/clients" class="btn btn-secondary">Volver</a>
  </div>
</div>