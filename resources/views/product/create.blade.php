@extends('layout.app')

@section('title', 'Crear Producto')

@section('content')

<main class="form-wrap">
  <div class="card form-container">
    <h2>Crear Nuevo Producto</h2>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-grid">

        <div class="form-group">
          <label>Categoria</label>
          <select name="estado" >
            @foreach ($categoryList as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>                
            @endforeach
          </select>
          @error('categoria')
          <span style="color:red; font-size:14px">
            {{ $message }}
          </span>
              
          @enderror
        </div>

        <div class="form-group full">
          <label>Nombre</label>
          <input type="text" name="nombre"  placeholder="Ej: Parlante Bluetooth">
          @error('nombre')
          <span style="color:red; font-size:14px">
            {{ $message }}
          </span>
              
          @enderror
        </div>

        <div class="form-group">
          <label>Precio</label>
          <input type="number" name="precio"  min="0" placeholder="Ej: 99000">
          @error('precio')
          <span style="color:red; font-size:14px">
            {{ $message }}
          </span>    
          @enderror          
        </div>

        <div class="form-group">
          <label>Imagen</label>
          <input type="file" name="imagen" accept="image/*">
          @error('imagen')
          <span style="color:red; font-size:14px">
            {{ $message }}
          </span>
              
          @enderror
        </div>

        <div class="form-group full">
          <label>Descripción</label>
          <textarea name="descripcion"  placeholder="Describe el producto..."></textarea>
          @error('descripcion')
          <span style="color:red; font-size:14px">
            {{ $message }}
          </span>
              
          @enderror
        </div>

      </div>

      <div class="row-actions">
        <button class="btn btn-primary" type="submit">Guardar Producto</button>
        <a class="btn btn-ghost" href="/product">Volver al listado</a>
      </div>

    </form>
  </div>
</main>

@endsection