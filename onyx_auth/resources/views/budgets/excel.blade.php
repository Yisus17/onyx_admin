<table>
  <tbody>
    <!-- HEADER -->
    <tr>
      <td colspan="9" style="text-align:center; height: 60px">
      </td>
    </tr>
    <tr>
      <th colspan="9" style="text-align:center; font-size: 16px">Onyx's Gerencia de Proyectos Audiovisuales SL</th>
    </tr>
    <tr>
      <td colspan="9" style="text-align:center;font-size: 8px">Calle Belianes 1, 1-4. 28043. Madrid - España</td>
    </tr>
    <tr>
      <td colspan="9" style="text-align:center;font-size: 8px">675 27 19 67 | adolfo@onyxs.es | B88095534</td>
    </tr>

    <tr>
      <td colspan="3" style="text-align:left; vertical-align: top"><b>Presupuesto #{{$budget->id}}</b></td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3" style="text-align:right;">Fecha de elaboración: {{ $budget->created_at ? $budget->created_at->format('d/m/Y') : ''}}</td>
    </tr>

    <!-- CLIENT DATA -->
    <tr>
      <td colspan="1">Cliente</td>
      <td colspan="8">{{$budget->client->name}}</td>
    </tr>

    <tr>
      <td colspan="1">Direccion</td>
      <td colspan="8">{{$budget->client->address}}</td>
    </tr>

    <tr>
      <td colspan="1">Teléfono</td>
      <td colspan="8" style="text-align:left;">{{$budget->client->phone}}</td>
    </tr>

    <tr>
      <td colspan="1">Email</td>
      <td colspan="8">{{$budget->client->email}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- BUDGET DATES AND LOCATION -->

    <tr>
      <td colspan="1" style="border: 1px solid black;">Entrega</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->delivery_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->delivery_date->format('H:m')}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Fin evento</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->end_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->end_date->format('H:m')}}</td>
    </tr>

    <tr>
      <td colspan="1" style="border: 1px solid black;">Montaje</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->instalation_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->instalation_date->format('H:m')}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Desmontaje</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->uninstalation_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->uninstalation_date->format('H:m')}}</td>
    </tr>

    <tr>
      <td colspan="1" style="border: 1px solid black;">Inicio evento</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->start_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->start_date->format('H:m')}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Devolucion</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->return_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$budget->return_date->format('H:m')}}</td>
    </tr>

    <tr>
      <td colspan="9" style="border: 1px solid black;">Locacion: {{$budget->address}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- PRODUCTS -->

    <tr>
      <td colspan="1">Cantidad</td>
      <td colspan="4">Descripción</td>
      <td colspan="1">Factor</td>
      <td colspan="1">Descuento</td>
      <td colspan="1">P/Unitario</td>
      <td colspan="1">P/Total</td>
    </tr>

    @foreach($budget->products as $product)
      <tr>
        <td colspan="1" style="text-align:right;">{{$product->pivot->quantity}}</td>
        <td colspan="4">{{$product->pivot->description}}</td>
        <td colspan="1" style="text-align:right;">{{$product->pivot->factor}}</td>
        <td colspan="1" style="text-align:right;">{{$product->pivot->discount}}%</td>
        <td colspan="1" style="text-align:right;">{{getFormattedPrice($product->pivot->unit_price)}}€</td>
        <td colspan="1" style="text-align:right;">{{getFormattedPrice($product->pivot->total_price)}}€</td>
      </tr>
    @endforeach

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- TOTAL PRICES -->

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">TOTAL (BASE IMPONIBLE)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($budget->total)}}€</td>
    </tr>

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">IVA ({{$budget->tax_percentage}}%)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($budget->tax_amount)}}€</td>
    </tr>

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">TOTAL (IVA INCLUIDO)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($budget->total_with_tax)}}€</td>
    </tr>

  
    @if($budget->notes)
      <!-- SEPARATOR -->
      <tr>
        <td colspan="9"></td>
      </tr>
      <!-- NOTES -->
      <tr>
        <td colspan="9">{{$budget->notes}}</td>
      </tr>
    @endif

    





  </tbody>
</table>