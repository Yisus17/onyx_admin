<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"><span class="guide-field">*</span>#</th>
      <th scope="col"><span class="guide-field">*</span>Contacto</th>
      <th scope="col">Fecha de creación</th>
      <th scope="col">Descripción</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($invoices as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->client->business_name }}</td>
        <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:m') : ''}}</td>
        <td>{{ truncateText($item->description, 20) }}</td>
        <td>
          <form action="{{ route('invoices.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a esta factura?');">
            @method('DELETE')
            @csrf
            <a href="{{route('invoices.show', $item->id)}}" class="btn btn-primary btn-sm" title="Mostrar factura"><i class="fas fa-eye" ></i></a>
            <a href="{{route('invoices.edit', $item)}}" class="btn btn-success btn-sm" title="Editar factura"><i class="fas fa-edit" ></i></a>
            <a href="{{route('invoices.excelExport', $item->id)}}" class="btn btn-success btn-sm" title="Descargar excel"><i class="fas fa-file-excel"></i></a>
            <a href="{{route('invoices.duplicate', $item->id)}}" class="btn btn-primary btn-sm" title="Duplicar factura" onclick="return confirm('¿Estás seguro que deseas duplicar a esta factura?');"><i class="fas fa-copy"></i></a>
            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar factura"><i class="fa fa-minus-circle" ></i></button>
          </form> 
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{$invoices->links()}}  