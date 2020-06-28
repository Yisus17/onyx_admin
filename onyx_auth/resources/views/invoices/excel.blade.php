<table>
  <tbody>
    <!-- HEADER -->
    <tr>
      <td colspan="9" style="text-align:center; height: 60px">
      </td>
    </tr>
    <tr>
      <th colspan="9" style="text-align:center; font-size: 16px">{{getOnyxBusinessName()}}</th>
    </tr>
    <tr>
      <td colspan="9" style="text-align:center;font-size: 8px">{{getOnyxAddress()}}</td>
    </tr>
    <tr>
      <td colspan="9" style="text-align:center;font-size: 8px">{{getOnyxInfo()}}</td>
    </tr>

    <tr>
      <td colspan="3" style="text-align:left; vertical-align: top"><b>Factura #{{$invoice->id}}</b></td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3" style="text-align:right;">Fecha de elaboración: {{ $invoice->created_at ? $invoice->created_at->format('d/m/Y') : ''}}</td>
    </tr>

    <!-- CLIENT DATA -->
    <tr>
      <td colspan="1">Contacto</td>
      <td colspan="8">{{$invoice->client->business_name}}</td>
    </tr>

    <tr>
      <td colspan="1">Direccion</td>
      <td colspan="8">{{$invoice->client->address}}</td>
    </tr>

    <tr>
      <td colspan="1">Teléfono</td>
      <td colspan="8" style="text-align:left;">{{$invoice->client->phone}}</td>
    </tr>

    <tr>
      <td colspan="1">Email</td>
      <td colspan="8">{{$invoice->client->email}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- BUDGET DATES AND LOCATION -->

    <tr>
      <td colspan="1" style="border: 1px solid black;">Entrega</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->delivery_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->delivery_date->format('H:m')}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Fin evento</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->end_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->end_date->format('H:m')}}</td>
    </tr>

    <tr>
      <td colspan="1" style="border: 1px solid black;">Montaje</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->instalation_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->instalation_date->format('H:m')}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Desmontaje</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->uninstalation_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->uninstalation_date->format('H:m')}}</td>
    </tr>

    <tr>
      <td colspan="1" style="border: 1px solid black;">Inicio evento</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->start_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->start_date->format('H:m')}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Devolución</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->return_date->format('d/m/Y')}}</td>
      <td colspan="1" style="border: 1px solid black;">{{$invoice->return_date->format('H:m')}}</td>
    </tr>

    <tr>
      <td colspan="9" style="border: 1px solid black;">Locación: {{$invoice->address}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- PRODUCTS -->

    @if($invoice->products)
      @foreach($invoice->products->groupBy('category_id') as $products)
        @foreach($products as $key => $product)
          @if($key == 0)
            <tr>
              <td colspan="9" style="font-weight: bold;">{{$product->category->name}}</td>
            </tr>
            <tr>
              <td colspan="1">Cantidad</td>
              <td colspan="4">Descripción</td>
              <td colspan="1">Factor</td>
              <td colspan="1">Descuento</td>
              <td colspan="1">P/Unitario</td>
              <td colspan="1">P/Total</td>
            </tr>
          @endif
          <tr>
            <td colspan="1" style="text-align:right;">{{$product->pivot->quantity}}</td>
            <td colspan="4">{{$product->pivot->description}}</td>
            <td colspan="1" style="text-align:right;">{{$product->pivot->factor}}</td>
            <td colspan="1" style="text-align:right;">{{$product->pivot->discount}}%</td>
            <td colspan="1" style="text-align:right;">{{getFormattedPrice($product->pivot->unit_price)}}€</td>
            <td colspan="1" style="text-align:right;">{{getFormattedPrice($product->pivot->total_price)}}€</td>
          </tr>
        @endforeach
      @endforeach
    @endif

    <!-- SEPARATOR -->
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
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($invoice->total)}}€</td>
    </tr>

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">IVA ({{$invoice->tax_percentage}}%)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($invoice->tax_amount)}}€</td>
    </tr>

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">TOTAL (IVA INCLUIDO)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($invoice->total_with_tax)}}€</td>
    </tr>

    @if($invoice->notes)
      <!-- SEPARATOR -->
      <tr>
        <td colspan="9"></td>
      </tr>
      <!-- NOTES -->
      <tr>
        <td colspan="9">{{$invoice->notes}}</td>
      </tr>
    @endif
  </tbody>
</table>