@extends('layout.admin')

@section('title', 'Crear Categoría')

@section('content')
<div class="form-wrap">
  <div class="card form-container">
    <h2 style="text-align:center; margin-bottom:10px;">Crear Nueva Categoría</h2>
    <p class="small" style="text-align:center; margin-bottom:18px;">
      Agrega una categoría para organizar los productos de TechMarket.
    </p>

    <form action="{{ route('categories.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="nombre">Nombre de la categoría</label>
        <input
          type="text"
          name="nombre"
          id="nombre"
          value="{{ old('nombre') }}"
          required
        >
        @error('nombre')
          <small style="color:#dc2626;">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea
          name="descripcion"
          id="descripcion"
          required
        >{{ old('descripcion') }}</textarea>
        @error('descripcion')
          <small style="color:#dc2626;">{{ $message }}</small>
        @enderror
      </div>

      <div class="row-actions">
        <button type="submit" class="btn btn-primary">Guardar categoría</button>
        <a href="{{ route('categories.index') }}" class="btn btn-ghost">Volver</a>
      </div>
    </form>
  </div>
</div>
@endsection