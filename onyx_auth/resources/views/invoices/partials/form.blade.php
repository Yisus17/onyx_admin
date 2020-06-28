<div class="form-group required-info">
  <span>*Campos obligatorios</span>
</div>

<!-- Invoice data -->
@include('invoices.partials.form.invoice_data')
<!-- End invoice data -->
  
<!-- Invoice products -->
  @include('invoices.partials.form.invoice_products') 
<!-- End invoice products -->

<!-- Form actions -->
<div class="row">
  <div class="form-group col-12">
    <button class="btn btn-primary " type="submit">Guardar</button>
    <a href="/invoices" class="btn btn-secondary">Volver</a>
  </div>
</div>
<!-- End form actions -->







