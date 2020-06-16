<div class="custom-form">
  <div class="form-group required-info">
    <span>*Campos obligatorios</span>
  </div>
  
  <div class="form-group">
    <label for="name"><span class="required-field">*</span>Razón Social</label>
    <input 
      type="text" 
      name="business_name" 
      class="form-control" 
      value="{{isset($client) ? $client->business_name : old('business_name')}}" 
      required/>
  </div>

  <div class="form-group">
    <label for="address"><span class="required-field">*</span>Dirección</label>
    <textarea 
      class="form-control" 
      name="address" 
      rows="2" 
      required>{{isset($client) ? $client->address : old('address')}}</textarea>
  </div>

  <div class="form-group">
    <label for="postal_code">Código postal</label>
    <input 
      type="text" 
      name="postal_code" 
      class="form-control" 
      value="{{isset($client) ? $client->postal_code : old('postal_code')}}"/>
  </div>

  <div class="form-group">
    <label for="community_id">Comunidad autónoma</label>
    <select name="community_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($communities as $community)
        <option value="{{ $community->id }}" {{ (isset($client) && $community->id == $client->community_id) || old('community_id') == $community->id ? 'selected' : '' }}>{{ $community->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="phone"><span class="required-field">*</span>Teléfono</label>
    <input 
      type="text" 
      name="phone" 
      class="form-control" 
      value="{{isset($client) ? $client->phone : old('phone')}}" 
      required/>
  </div>

  <div class="form-group">
    <label for="secondary_phone">Teléfono secundario</label>
    <input 
      type="text" 
      name="secondary_phone" 
      class="form-control" 
      value="{{isset($client) ? $client->secondary_phone : old('secondary_phone')}}" />
  </div>

  <div class="form-group">
    <label for="name"><span class="required-field">*</span>Nombre</label>
    <input 
      type="text" 
      name="name" 
      class="form-control" 
      value="{{isset($client) ? $client->name : old('name')}}" 
      required/>
  </div>

  <div class="form-group">
    <label for="lastname"><span class="required-field">*</span>Apellido</label>
    <input 
      type="text" 
      name="lastname" 
      class="form-control" 
      value="{{isset($client) ? $client->lastname : old('lastname')}}" 
      required/>
  </div>

  <div class="form-group">
    <label for="email"><span class="required-field">*</span>Email</label>
    <input 
      type="email" 
      name="email" 
      class="form-control" 
      value="{{isset($client) ? $client->email : old('email')}}" 
      required/>
  </div>

  <div class="form-group">
    <label for="client_type_id">Tipo</label>
    <select name="client_type_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($clientTypes as $clientType)
        <option value="{{ $clientType->id }}" {{ (isset($client) && $clientType->id == $client->client_type_id) || old('client_type_id') == $clientType->id ? 'selected' : '' }}>{{ $clientType->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <button class="btn btn-primary " type="submit">Guardar</button>
    <a href="/clients" class="btn btn-secondary">Volver</a>
  </div>
</div>