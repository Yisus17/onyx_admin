<table class="table table-bordered table-sm">
  <tbody>
    <tr class="table-soft-header">
      <th colspan="4">Fecha de elaboración</th>
      <th colspan="4">Contacto</th>
      <th colspan="4">Validez</th>
    </tr>
    <tr>
      <td colspan="4">{{$invoice->created_at ? $invoice->created_at->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$invoice->client->name}}</td>
      <td colspan="4">{{$invoice->validity ? findValue(getValidityOptions(), $invoice->validity): ''}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="6">Dirección</th>
      <th colspan="6">Descripción del evento</th>
    </tr>
    <tr>
      <td colspan="6">{{$invoice->address}}</td>
      <td colspan="6">{{$invoice->description}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="4">Entrega</th>
      <th colspan="4">Devolución</th>
      <th colspan="4">Montaje</th>
    </tr>
    <tr>
      <td colspan="4">{{$invoice->delivery_date ? $invoice->delivery_date->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$invoice->return_date ? $invoice->return_date->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$invoice->instalation_date ? $invoice->instalation_date->format('d/m/Y H:m') : ''}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="4">Inicio evento</th>
      <th colspan="4">Fin evento</th>
      <th colspan="4">Desmontaje</th>
    </tr>
    <tr>
      <td colspan="4">{{$invoice->start_date ? $invoice->start_date->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$invoice->end_date ? $invoice->end_date->format('d/m/Y H:m') : ''}}</td>
      <td colspan="4">{{$invoice->uninstalation_date ? $invoice->uninstalation_date->format('d/m/Y H:m') : ''}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="6">Condiciones de pago</th>
      <th colspan="6">Método de pago</th>
    </tr>
    <tr>
      <td colspan="6">{{$invoice->payment_conditions ? findValue(getPaymentConditions(), $invoice->payment_conditions) : '' }}</td>
      <td colspan="6">{{$invoice->payment_method ? findValue(getPaymentMethods(), $invoice->payment_method) : ''}}</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="4">Total (Base imponible)</th>
      <th colspan="4">IVA</th>
      <th colspan="4">Total (IVA incluido)</th>
    </tr>
    <tr>
      <td colspan="4">{{getFormattedPrice($invoice->total)}}€</td>
      <td colspan="4">{{getFormattedPrice($invoice->tax_amount)}}€</td>
      <td colspan="4">{{getFormattedPrice($invoice->total_with_tax)}}€</td>
    </tr>

    <tr class="table-soft-header">
      <th colspan="12">Notas</th>
    </tr>
    <tr>
      <td colspan="12">{{$invoice->notes}}</td>
    </tr>
  </tbody>
</table>