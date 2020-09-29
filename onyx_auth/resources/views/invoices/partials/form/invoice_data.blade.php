<div id="invoice-data" class="row mb-2">
  <div class="form-group col-6">
    <label for="client_id"><span class="required-field">*</span>Contacto</label>
    <select name="client_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($clients as $client)
        <option value="{{ $client->id }}" {{ (isset($invoice) && $client->id == $invoice->client_id) || old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->business_name }}</option>
      @endforeach
    </select>
  </div>


  <div class="form-group col-6">
    <label for="validity"><span class="required-field">*</span>Validez</label>
    <select name="validity" class="form-control">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach(getValidityOptions() as $key => $value)
        <option 
          value="{{$key}}"
          {{(isset($invoice) && $key == $invoice->validity) || old('validity') == $key ? 'selected' : '' }}>
          {{$value}}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group col-6">
    <label for="address"><span class="required-field">*</span>Dirección</label>
    <textarea name="address" class="form-control" rows="2">{{isset($invoice) ? $invoice->address : old('address')}}</textarea>
  </div>

  <div class="form-group col-6">
    <label for="description"><span class="required-field">*</span>Descripción del evento</label>
    <textarea class="form-control" name="description" rows="2">{{isset($invoice) ? $invoice->description : old('description')}}</textarea>
  </div>

  <div class="form-group col-6">
    <label for="delivery_date"><span class="required-field">*</span>Entrega</label>
    <div class="input-group">
      <input type="text" id="delivery_date" name="delivery_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-6">
    <label for="return_date"><span class="required-field">*</span>Devolución</label>
    <div class="input-group">
      <input type="text" id="return_date" name="return_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-6">
    <label for="instalation_date"><span class="required-field">*</span>Montaje</label>
    <div class="input-group">
      <input type="text" id="instalation_date" name="instalation_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-6">
    <label for="start_date"><span class="required-field">*</span>Inicio evento</label>
    <div class="input-group">
      <input type="text" id="start_date" name="start_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-6">
    <label for="end_date"><span class="required-field">*</span>Fin evento</label>
    <div class="input-group">
      <input type="text" id="end_date" name="end_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-6">
    <label for="uninstalation_date"><span class="required-field">*</span>Desmontaje</label>
    <div class="input-group">
      <input type="text" id="uninstalation_date" name="uninstalation_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-4">
    <label for="payment_conditions"><span class="required-field">*</span>Condiciones de pago</label>
    <select name="payment_conditions" class="form-control">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach(getPaymentConditions() as $key => $value)
        <option 
          value="{{$key}}"
          {{(isset($invoice) && $key == $invoice->payment_conditions) || old('payment_conditions') == $key ? 'selected' : '' }}>
        {{$value}}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group col-4">
    <label for="payment_method"><span class="required-field">*</span>Método de pago</label>
    <select name="payment_method" class="form-control">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach(getPaymentMethods() as $key => $value)
        <option 
          value="{{$key}}"
          {{(isset($invoice) && $key == $invoice->payment_method) || old('payment_method') == $key ? 'selected' : '' }}>
          {{$value}}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group col-4">
    <label for="tax_percentage"><span class="required-field">*</span>IVA</label>
    <div class="input-group">
      <input 
        type="number" 
        name="tax_percentage" 
        class="form-control"
        min="0" max="100" step="1" 
        value="{{isset($invoice) ? $invoice->tax_percentage : 21}}" />
      <div class="input-group-append">
        <span class="input-group-text">%</span>
      </div>
    </div>
  </div>

  <div class="form-group col-12">
    <label for="notes">Notas</label>
    <textarea class="form-control" name="notes" rows="2">{{isset($invoice) ? $invoice->notes : old('notes')}}</textarea>
  </div>
</div>

@section('scripts')
  @parent
  <script type="text/javascript">
    $('#invoice-data .datetimepicker').datetimepicker({
      ...defaultDatetimepickerOptions,
      format: "DD/MM/YYYY HH:mm"
    });
  </script>

  @if(isset($invoice))
    <script type="text/javascript">
      '{{$invoice->delivery_date}}' ? 
        setDateData('{{$invoice->delivery_date}}', '#delivery_date', false ) :
        setDateData('{{old("delivery_date")}}', '#delivery_date', true )

      '{{$invoice->return_date}}' ? 
        setDateData('{{$invoice->return_date}}', '#return_date', false ) :
        setDateData('{{old("return_date")}}', '#return_date', true )

      '{{$invoice->instalation_date}}' ? 
        setDateData('{{$invoice->instalation_date}}', '#instalation_date', false ) :
        setDateData('{{old("instalation_date")}}', '#instalation_date', true )

      '{{$invoice->start_date}}' ? 
        setDateData('{{$invoice->start_date}}', '#start_date', false ) :
        setDateData('{{old("start_date")}}', '#start_date', true )

      '{{$invoice->end_date}}' ? 
        setDateData('{{$invoice->end_date}}', '#end_date', false ) :
        setDateData('{{old("end_date")}}', '#end_date', true )
      
      '{{$invoice->uninstalation_date}}' ? 
        setDateData('{{$invoice->uninstalation_date}}', '#uninstalation_date', false ) :
        setDateData('{{old("uninstalation_date")}}', '#uninstalation_date', true )
    </script>
  @endif
@endsection
