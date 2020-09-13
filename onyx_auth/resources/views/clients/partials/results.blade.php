<div class="table-responsive"> 
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col"><span class="guide-field">*</span>Razón social</th>
        <th scope="col"><span class="guide-field">*</span>Teléfono</th>
        <th scope="col"><span class="guide-field">*</span>Email</th>
        <th scope="col">Dirección</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clients as $item)
        <tr>
          <td>{{ $item->business_name }}</td>
          <td>{{ $item->phone }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->address }}</td>
          <td>
            <form action="{{ route('clients.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a este contacto?');">
              @method('DELETE')
              @csrf
              <a href="{{route('clients.show', $item->id)}}" class="btn btn-primary btn-sm" title="Edit item"><i class="fas fa-eye" ></i></a>
              <a href="{{route('clients.edit', $item)}}" class="btn btn-success btn-sm" title="Edit item"><i class="fas fa-edit"></i></a>
              <button type="submit" class="btn btn-danger btn-sm" title="Delete item"><i class="fa fa-minus-circle" ></i></button>
            </form> 
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div> 
{{$clients->links()}}  