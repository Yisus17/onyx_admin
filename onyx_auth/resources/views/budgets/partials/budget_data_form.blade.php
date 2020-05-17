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
  <div class="input-group">
    <input type="text" id="delivery_date" name="delivery_date" class="form-control datepicker" autocomplete="off"/>
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
    </div>
  </div>
</div>

<div class="form-group col-6">
  <label for="return_date"><span class="required-field">*</span>Devolución</label>
  <div class="input-group">
    <input type="text" id="return_date" name="return_date" class="form-control datepicker" autocomplete="off"/>
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
    </div>
  </div>
</div>

<div class="form-group col-6">
  <label for="instalation_date"><span class="required-field">*</span>Montaje</label>
  <div class="input-group">
    <input type="text" id="instalation_date" name="instalation_date" class="form-control datepicker" autocomplete="off"/>
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
    </div>
  </div>
</div>

<div class="form-group col-6">
  <label for="start_date"><span class="required-field">*</span>Inicio evento</label>
  <div class="input-group">
    <input type="text" id="start_date" name="start_date" class="form-control datepicker" autocomplete="off"/>
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
    </div>
  </div>
</div>

<div class="form-group col-6">
  <label for="end_date"><span class="required-field">*</span>Fin evento</label>
  <div class="input-group">
    <input type="text" id="end_date" name="end_date" class="form-control datepicker" autocomplete="off"/>
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
    </div>
  </div>
</div>

<div class="form-group col-6">
  <label for="uninstalation_date"><span class="required-field">*</span>Desmontaje</label>
  <div class="input-group">
    <input type="text" id="uninstalation_date" name="uninstalation_date" class="form-control datepicker" autocomplete="off"/>
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
    </div>
  </div>
</div>

<div class="form-group col-6">
  <label for="payment_conditions"><span class="required-field">*</span>Condiciones de pago</label>
  <select name="payment_conditions" class="form-control">
    <option value="" selected disabled>--Selecciona una opción--</option>
    @foreach($paymentConditions as $key => $value)
      <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
</div>

<div class="form-group col-6">
  <label for="payment_method"><span class="required-field">*</span>Método de pago</label>
  <select name="payment_method" class="form-control">
    <option value="" selected disabled>--Selecciona una opción--</option>
    @foreach($paymentMethods as $key => $value)
      <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
</div>

<div class="form-group col-12">
  <label for="notes">Notas</label>
  <textarea class="form-control" name="notes" rows="2"></textarea>
</div>

@section('scripts')
  <script>
    $('#budget-data .datepicker').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      todayHighlight: true
    });
  </script>
@endsection



