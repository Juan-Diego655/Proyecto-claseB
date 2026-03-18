@extends('layout.admin')

@section('title', 'Categorías')

@section('content')
<div class="container">

  <div class="header-row">
    <div>
      <h2>Gestión de Categorías</h2>
      <p class="small">Administra las categorías del ecommerce.</p>
    </div>

    <div class="tools">
      <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Nueva categoría</a>
    </div>
  </div>

  @if($categoryList->count())
    <div class="card" style="padding:20px;">
      <div class="admin-table-wrap">
        <table class="admin-table">
          <thead>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Acción</th>
  </tr>
</thead>
<tbody>
  @foreach($categoryList as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td>{{ $category->name }}</td>
      <td>{{ $category->description }}</td>
      <td>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-ghost btn-sm">Eliminar</button>
        </form>
      </td>
    </tr>
  @endforeach
</tbody>
        </table>
      </div>
    </div>
  @else
    <div class="empty">
      No hay categorías registradas.
    </div>
  @endif

</div>
@endsection