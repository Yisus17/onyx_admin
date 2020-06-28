<div class="form-group required-info">
  <span>*Campos obligatorios</span>
</div>

<!-- Budget data -->
  @include('budgets.partials.form.budget_data')
<!-- End budget data -->
  
<!-- Budget products -->
  @include('budgets.partials.form.budget_products') 
<!-- End budget products -->

<!-- Form actions -->
<div class="row">
  <div class="form-group col-12">
    <button class="btn btn-primary " type="submit">Guardar</button>
    <a href="/budgets" class="btn btn-secondary">Volver</a>
  </div>
</div>
<!-- End form actions -->







