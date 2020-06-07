<table class="table table-bordered table-sm">
  <tbody>
    <tr class="table-soft-header">
      <th colspan="4">Fecha de elaboración</th>
      <th colspan="4">Contacto</th>
      <th colspan="4">Validez</th>
    </tr>
    <tr>
      <td colspan="4">{{$budget->created_at ? $budget->created_at->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$budget->client->name}}</td>
      <td colspan="4">{{$budget->validity ? findValue(getValidityOptions(), $budget->validity): ''}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="6">Dirección</th>
      <th colspan="6">Descripción del evento</th>
    </tr>
    <tr>
      <td colspan="6">{{$budget->address}}</td>
      <td colspan="6">{{$budget->description}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="4">Entrega</th>
      <th colspan="4">Devolución</th>
      <th colspan="4">Montaje</th>
    </tr>
    <tr>
      <td colspan="4">{{$budget->delivery_date ? $budget->delivery_date->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$budget->return_date ? $budget->return_date->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$budget->instalation_date ? $budget->instalation_date->format('d/m/Y H:m') : ''}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="4">Inicio evento</th>
      <th colspan="4">Fin evento</th>
      <th colspan="4">Desmontaje</th>
    </tr>
    <tr>
      <td colspan="4">{{$budget->start_date ? $budget->start_date->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$budget->end_date ? $budget->end_date->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$budget->uninstalation_date ? $budget->uninstalation_date->format('d/m/Y H:m') : ''}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="6">Condiciones de pago</th>
      <th colspan="6">Método de pago</th>
    </tr>
    <tr>
      <td colspan="6">{{$budget->payment_conditions ? findValue(getPaymentConditions(), $budget->payment_conditions) : '' }}</td>
      <td colspan="6">{{$budget->payment_method ? findValue(getPaymentMethods(), $budget->payment_method) : ''}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="4">Total (Base imponible)</th>
      <th colspan="4">IVA</th>
      <th colspan="4">Total (IVA incluido)</th>
    </tr>
    <tr>
      <td colspan="4">{{getFormattedPrice($budget->total)}}€</td>
      <td colspan="4">{{getFormattedPrice($budget->tax_amount)}}€</td>
      <td colspan="4">{{getFormattedPrice($budget->total_with_tax)}}€</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="12">Notas</th>
    </tr>
    <tr>
      <td colspan="12">{{$budget->notes}}</td>
    </tr>
  </tbody>
</table>