<div class="form-group col-6">
  <label for="client_id"><span class="required-field">*</span>Contacto</label>
  <select name="client_id" class="form-control selectpicker" data-live-search="true">
    <option value="" selected disabled>--Selecciona una opción--</option>
    @foreach($clients as $client)
      <option value="{{ $client->id }}" {{ (isset($budget) && $client->id == $budget->client_id) || old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
    @endforeach
  </select>
</div>

<div class="form-group col-6">
  <label for="validity"><span class="required-field">*</span>Validez</label>
  <select name="validity" class="form-control">
    <option value="" selected disabled>--Selecciona una opción--</option>
    @foreach($validityOptions as $key => $value)
      <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
</div>

<div class="form-group col-6">
  <label for="address"><span class="required-field">*</span>Dirección</label>
  <textarea name="address" class="form-control" rows="2"></textarea>
</div>

<div class="form-group col-6">
  <label for="description"><span class="required-field">*</span>Descripción del evento</label>
  <textarea class="form-control" name="description" rows="2"></textarea>
</div>

<div class="form-group col-6">
  <label for="delivery_date"><span class="required-field">*</span>Entrega</label>
  <input type="text" id="delivery_date" name="delivery_date" class="form-control datepicker" autocomplete="off"/>
</div>

<div class="form-group col-6">
  <label for="return_date"><span class="required-field">*</span>Devolución</label>
  <input type="text" id="return_date" name="return_date" class="form-control datepicker" autocomplete="off"/>
</div>

<div class="form-group col-6">
  <label for="instalation_date"><span class="required-field">*</span>Montaje</label>
  <input type="text" id="instalation_date" name="instalation_date" class="form-control datepicker" autocomplete="off"/>
</div>

<div class="form-group col-6">
  <label for="start_date"><span class="required-field">*</span>Inicio evento</label>
  <input type="text" id="start_date" name="start_date" class="form-control datepicker" autocomplete="off"/>
</div>

<div class="form-group col-6">
  <label for="end_date"><span class="required-field">*</span>Fin evento</label>
  <input type="text" id="end_date" name="end_date" class="form-control datepicker" autocomplete="off"/>
</div>

<div class="form-group col-6">
  <label for="uninstalation_date"><span class="required-field">*</span>Desmontaje</label>
  <input type="text" id="uninstalation_date" name="uninstalation_date" class="form-control datepicker" autocomplete="off"/>
</div>



