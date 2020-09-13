<div class="table-responsive">
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
      @foreach ($budgets as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->client->name }}</td>
        <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:m') : ''}}</td>
        <td>{{ truncateText($item->description, 20) }}</td>
        <td>
          <form action="{{ route('budgets.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a este presupuesto?');">
            @method('DELETE')
            @csrf
            <a href="{{route('budgets.show', $item->id)}}" class="btn btn-primary btn-sm" title="Mostrar presupuesto"><i class="fas fa-eye"></i></a>
            <a href="{{route('budgets.edit', $item)}}" class="btn btn-success btn-sm" title="Editar presupuesto"><i class="fas fa-edit"></i></a>
            <a href="{{route('budgets.excelExport', $item->id)}}" class="btn btn-success btn-sm" title="Descargar excel"><i class="fas fa-file-excel"></i></a>
            <a href="{{route('budgets.duplicate', $item->id)}}" class="btn btn-primary btn-sm" title="Duplicar presupuesto" onclick="return confirm('¿Estás seguro que deseas duplicar a este presupuesto?');"><i class="fas fa-copy"></i></a>
            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar presupuesto"><i class="fa fa-minus-circle"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{$budgets->links()}}