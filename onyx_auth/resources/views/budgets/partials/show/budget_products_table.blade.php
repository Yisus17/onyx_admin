<table class="table table-bordered table-sm">
  <tbody>

    <tr class="table-soft-header">
      <th colspan="3">Código</th>
      <th colspan="9">Descripción</th>
    </tr>
    <tr>
      <td colspan="3">{{$product->code}}</th>
      <td colspan="9">{{$product->pivot->description}}</th>
    </tr>

    <tr class="table-soft-header">
      <th colspan="3">Cantidad</th>
      <th colspan="3">Factor</th>
      <th colspan="3">Precio unitario</th>
      <th colspan="3">Descuento</th>
    </tr>
    <tr>
      <td colspan="3">{{$product->pivot->quantity}}</td>
      <td colspan="3">{{$product->pivot->factor}}</td>
      <td colspan="3">{{getFormattedPrice($product->pivot->unit_price)}}€</td>
      <td colspan="3">{{$product->pivot->discount}}%</td>
    </tr>

    <tr class="table-soft-header text-right">
      <th colspan="12">Base imponible</th>
    </tr>
    <tr class="text-right">
      <td colspan="12">{{getFormattedPrice($product->pivot->total_price)}}€</th>
    </tr>
    
  </tbody>
</table>